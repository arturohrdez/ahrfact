<?php

namespace app\controllers;

/* use Yii;
  use yii\filters\AccessControl;
  use yii\web\Controller;
  use yii\filters\VerbFilter;
  use app\models\LoginForm;
  use app\models\ContactForm; */

use Yii;
use app\models\ContactForm;
use app\models\Empresa;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ProfileForm;
use app\models\ProfileResetPassword;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\User;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SiteController extends Controller {

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','error','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index','empresa','datosfiscales','profile','datospersonales','datosacceso'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'errorLayout'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        //Layout Login
        $this->layout = "main-login";
        $model        = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }//end function

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(['site/login']);
        //return $this->goHome();
    }//end function

    public function actionProfile(){
        return $this->render("profile");
    }//end function

    public function actionDatospersonales(){
        $modelUser               = User::findOne(Yii::$app->user->identity->id);
        $modelProfile            = new ProfileForm();
        $modelProfile->id        = $modelUser->id;
        $modelProfile->name      = $modelUser->name;
        $modelProfile->firstname = $modelUser->firstname;
        $modelProfile->lastname  = $modelUser->lastname;
        $modelProfile->email     = $modelUser->email;
        $readonly                = true;

        if($modelProfile->load(Yii::$app->request->post())){
            $resProfile = $modelProfile->updateProfile();
            if(!$resProfile["response"]){
                Yii::$app->session->setFlash('danger', "Hubo algun error y no se pudo actualizar tu información.");
                return $this->renderAjax("_datospersonales",["modelProfile"=>$resProfile["model"],"readonly"=>$readonly]);
            }//end if

            Yii::$app->session->setFlash('success', "Tu información se actualizo correctamente.");
            return $this->renderAjax("_datospersonales",["modelProfile"=>$modelProfile,"readonly"=>$readonly]);
        }//end if

        return $this->renderAjax("_datospersonales",["modelProfile"=>$modelProfile,"readonly"=>$readonly]);
    }//end function

    public function actionDatosacceso(){
        $modelUser                           = User::findOne(Yii::$app->user->identity->id);
        $modelProfileResetPassword           = new ProfileResetPassword();
        $modelProfileResetPassword->id       = $modelUser->id;

        if($modelProfileResetPassword->load(Yii::$app->request->post()) && $modelProfileResetPassword->validate()){
            $modelProfileResetPassword->updateProfile();
            $modelProfileResetPassword = new ProfileResetPassword();    
            Yii::$app->session->setFlash('success', "Tu información se actualizo correctamente.");
            return $this->renderAjax("_datosdeacceso",["modelResetPass"=>$modelProfileResetPassword,"modelUser"=>$modelUser]);
        }//end if

        $modelProfileResetPassword->password = null;
        return $this->renderAjax("_datosdeacceso",["modelResetPass"=>$modelProfileResetPassword,"modelUser"=>$modelUser]);
    }//end function

    public function actionEmpresa(){
        return $this->render("empresa");
    }//end function

    public function actionDatosfiscales(){
        $modelUser    = User::findOne(Yii::$app->user->identity->id);
        $modelEmpresa = Empresa::find()->where(['cliente_id'=>$modelUser->cliente_id])->one();
        if(is_null($modelEmpresa)){
            $modelEmpresa       =  new Empresa();
            $modelEmpresa->pais = "México";
            $readonly           = false;
            $rfc                = "new";
        }else{
            $rfc      = $modelEmpresa->rfc;
            $readonly =  true;
        }//end if

        if($modelEmpresa->load(Yii::$app->request->post())){
            if($modelEmpresa->validate()){
                if($rfc != "new"){
                    $modelEmpresa->rfc = $rfc;
                }//end if
                
                $modelEmpresa->save();
                $readonly =  true;
                Yii::$app->session->setFlash('success', "Datos Fiscales guardados correctamente.");
            }else{
                Yii::$app->session->setFlash('danger', "Hubo algunos errores y no se pudo actualizar tu información, por favor revisar tus datos.");
            }//end if
        }//end if
        return $this->renderAjax('_datosfiscales',['modelEmpresa'=> $modelEmpresa,'modelUser'=>$modelUser,'readonly'=>$readonly]);
    }//end function

    public function actionSignup() {
        /*$this->layout = "main-login";
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);*/
        $this->redirect(["sistema/register"]);
    }

    /*public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }*/

    /*public function actionAbout() {
        return $this->render('about');
    }*/

    /*public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetpassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }*/

}
