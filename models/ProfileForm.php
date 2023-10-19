<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileForm extends Model
{
    public $id;
    public $email;
    public $name;
    public $firstname;
    public $lastname;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['id','name', 'email', 'firstname', 'lastname'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'filter' => ['not', ['id' => $this->id]], 'message' => 'Este correo electrónico ya está en uso.']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id'        => "Id Profile",
            'email'     => 'Email',
            'name'      => 'Nombre(s)',
            'firstname' => 'Apellido Paterno',
            'lastname'  => 'Apellido Materno',
        ];
    }

    public function updateProfile(){
        $modelUser            = User::findOne($this->id);
        if ($this->validate()) {
            $modelUser->email     = $this->email;
            $modelUser->name      = $this->name;
            $modelUser->firstname = $this->firstname;
            $modelUser->lastname  = $this->lastname;
            $modelUser->save();

            return ["response"=>true,"model"=>$this];
        }else{
            return ["response"=>false,"model"=>$this];
        }//end if
    }//end function
}
