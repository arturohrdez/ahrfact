<?php

namespace app\controllers;

use Yii;
use app\models\Clientes;
use app\models\SignupForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SistemaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','register'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [],
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
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex(){
        /*$this->layout = "main-register";
        return $this->render('index');*/
        return $this->redirect('register');
    }

    public function actionRegister(){
        $this->layout = "main-register";
        $modelCliente = new Clientes();
        $modelSignup  = new SignupForm();


        if($modelCliente->load(Yii::$app->request->post())){
            if($modelCliente->validate()){
                $modelCliente->save();

                if($modelSignup->load(Yii::$app->request->post())){
                    $saveSignUp = $modelSignup->signup($modelCliente->id);
                    if(!$saveSignUp["success"]){
                        //Borra el cliente generado
                        $modelCliente_delete = Clientes::findOne($modelCliente->id);
                        if($modelCliente_delete){
                            $modelCliente_delete->delete();
                        }//end if
                        return $this->render('register',["modelCliente"=>$modelCliente,"modelSignup"=>$modelSignup]);
                    }//end if
                    
                    Yii::$app->session->setFlash('success', '<div class="text-center text-primary">
                        <h4>¡Gracias por registrate en AHRFact!</h4>
                        <br><br>
                    </div>
                    <div class="text-center text-dark">
                        <i class="fas fa-envelope fa-lg text-primary"></i>
                        <br>
                        Te hemos enviado un correo de confirmación a '.$modelCliente->email.'
                    </div>
                    <br><br>
                    <div class="text-center">
                        Confirma tu correo para continuar. <br> En caso de no haberlo recibido, por favor revisa tu carpeta de Spam.
                    </div>');
                }//end if
            }//end if
        }//end if

        return $this->render('register',["modelCliente"=>$modelCliente,"modelSignup"=>$modelSignup]);
    }

}
