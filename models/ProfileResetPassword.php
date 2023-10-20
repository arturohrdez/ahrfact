<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileResetPassword extends Model
{
    public $password;
    public $newPassword;
    public $confirmPassword;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['password', 'newPassword', 'confirmPassword'], 'required'],
            ['password', 'validatePassword'], // Valida la contraseña actual
            ['confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Las contraseñas no coinciden.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'password'        => "Contraseña",
            'newPassword'     => 'Nueva Contraseña',
            'confirmPassword' => 'Confirmar Nueva Contraseña'
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
