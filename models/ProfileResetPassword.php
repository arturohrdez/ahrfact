<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;
use yii\base\Security;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileResetPassword extends Model
{
    public $id;
    public $password;
    public $newPassword;
    public $confirmPassword;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id','password', 'newPassword', 'confirmPassword'], 'required'],
            ['password', 'validatePassword'], // Valida la contraseña actual
            ['newPassword', 'validateStrongPassword'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Las contraseñas no coinciden.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id'              => "Id Profile",
            'password'        => "Contraseña Actual",
            'newPassword'     => 'Nueva Contraseña',
            'confirmPassword' => 'Confirmar Nueva Contraseña'
        ];
    }

    public function validatePassword($attribute, $params){
        $security        = new Security();
        $modelUser       = User::findOne($this->id);
        $actualPass      = $modelUser->password_hash;
        $actualPass_form = $this->password;
        if (!$security->validatePassword($actualPass_form, $actualPass)) {
            $this->addError($attribute, 'La contraseña no es correcta, debe escribir la contraseña actual.');
        }
    }//end if

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

    public function updateProfile(){
        $modelUser            = User::findOne($this->id);
        if ($this->validate()) {
            $modelUser->setPassword($this->newPassword);
            $modelUser->generateAuthKey();
            $modelUser->save();

            return true;
        }//end if
        return false;
    }//end function
}
