<?php
namespace app\models;


use Yii;
use app\models\SignupForm;
use app\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $cliente_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'El nombre de usuario ya se encuentra en uso.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            //['email', 'unique', 'targetClass' => User::class, 'message' => 'El correo electrónico ya se encuentra en uso.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user             = new User();
            $user->username   = $this->username;
            $user->email      = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->cliente_id = $this->cliente_id;
            if ($user->save()) {
                return ["success"=>true,"result"=>$user];
            }
        }else{
            return ["success"=>false,"result"=>$this->errors];
        }

        return null;
    }
}
