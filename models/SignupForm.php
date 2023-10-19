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
    public $name;
    public $firstname;
    public $lastname;
    public $passwordConfirm;

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
            ['username', 'validBlankSpace'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],

            [['password','passwordConfirm'], 'required'],
            [['password'], 'validateStrongPassword'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Las contraseñas no coinciden.'],
        ];
    }

     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username'        => 'Nombre de usuario',
            'email'           => 'Email',
            'password'        => 'Contraseña',
            'passwordConfirm' => 'Confirmar Contraseña'
        ];
    }

    public function validBlankSpace($attribute, $params){
        if (strpos($this->$attribute, ' ') !== false) {
            $this->addError($attribute, 'El nombre de usuario no debe contener espacios en blanco.');
        }

        if (preg_match('/[áéíóúÁÉÍÓÚ]/u', $this->$attribute)) {
            $this->addError($attribute, 'El nombre de usuario no debe contener acentos.');
        }
    }

    public function validateStrongPassword($attribute, $params){
        $password = $this->$attribute;
        // Verifica la longitud mínima
        if (mb_strlen($password) < 8) {
            $this->addError($attribute, 'La contraseña debe tener al menos 8 caracteres.');
        }

        // Verifica si contiene al menos una letra mayúscula
        if (!preg_match('/[A-Z]/', $password)) {
            $this->addError($attribute, 'La contraseña debe contener al menos una letra mayúscula.');
        }

        // Verifica si contiene al menos una letra minúscula
        if (!preg_match('/[a-z]/', $password)) {
            $this->addError($attribute, 'La contraseña debe contener al menos una letra minúscula.');
        }

        // Verifica si contiene al menos un número
        if (!preg_match('/\d/', $password)) {
            $this->addError($attribute, 'La contraseña debe contener al menos un número.');
        }
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
            $user->name       = $this->name;
            $user->firstname  = $this->firstname;
            $user->lastname   = $this->lastname;
            if ($user->save()) {
                return ["success"=>true,"result"=>$user];
            }
        }else{
            return ["success"=>false,"result"=>$this->errors];
        }

        return null;
    }
}
