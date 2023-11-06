<?php

namespace app\controllers;

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;
use app\models\ExcelUploadForm;
use app\models\User;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $modelUser   = User::findOne(Yii::$app->user->identity->id);
        $searchModel = new CustomersSearch();
        $params      = Yii::$app->request->queryParams;
        $params["CustomersSearch"]["cliente_id"] = $modelUser->cliente_id; //Filtra customers del cliente relacionado al usuario
        
        
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    private function validHeadersFile($worksheet){
        $headers          = Yii::$app->params["headers_import_customers"];
        $razon_social     = $worksheet->getCell('A1')->getValue();
        $nombre_comercial = $worksheet->getCell('B1')->getValue();
        $rfc              = $worksheet->getCell('C1')->getValue();
        $uso_cfdi         = $worksheet->getCell('D1')->getValue();
        $regimen_fiscal   = $worksheet->getCell('E1')->getValue();
        $forma_pago       = $worksheet->getCell('F1')->getValue();
        $calle            = $worksheet->getCell('G1')->getValue();
        $no_exterior      = $worksheet->getCell('H1')->getValue();
        $no_interior      = $worksheet->getCell('I1')->getValue();
        $colonia          = $worksheet->getCell('J1')->getValue();
        $municipio        = $worksheet->getCell('K1')->getValue();
        $ciudad           = $worksheet->getCell('L1')->getValue();
        $referencia       = $worksheet->getCell('M1')->getValue();
        $estado           = $worksheet->getCell('N1')->getValue();
        $pais             = $worksheet->getCell('O1')->getValue();
        $codigo_postal    = $worksheet->getCell('P1')->getValue();
        $telefono         = $worksheet->getCell('Q1')->getValue();
        $email            = $worksheet->getCell('R1')->getValue();

        if($razon_social != $headers[0] || $nombre_comercial != $headers[1] || $rfc != $headers[2] || $uso_cfdi != $headers[3] || $regimen_fiscal != $headers[4] || $forma_pago != $headers[5] || $calle != $headers[6] || $no_exterior != $headers[7] || $no_interior != $headers[8] || $colonia != $headers[9] || $municipio != $headers[10] || $ciudad != $headers[11] || $referencia != $headers[12] || $estado != $headers[13] || $pais != $headers[14] || $codigo_postal != $headers[15] || $telefono != $headers[16] || $email != $headers[17]){
            return false;
        }

        return true;
    }//end function

    private function validInsertCustomer($rfc,$cliente_id){
        $searchCustomer = Customers::find()->where(["rfc"=>$rfc,"cliente_id"=>$cliente_id])->andWhere(['<>',"estatus",2])->orderBy(['id' => SORT_DESC])->count();
        return $searchCustomer;
    }//end function

    public function actionImport(){
        $model = new ExcelUploadForm();

        if($model->load(Yii::$app->request->post())){
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');

            if ($model->excelFile){
                $spreadsheet  = IOFactory::load($model["excelFile"]->tempName);
                $worksheet    = $spreadsheet->getActiveSheet();
                $validHeaders = $this->validHeadersFile($worksheet);

                if(!$validHeaders){
                    Yii::$app->session->setFlash('danger', "El archivo <strong>".$model["excelFile"]->name."</strong> no contiene las cabeceras necesarias o tienen un nombre incorrecto, por favor verifique el archivo y vuelva a intentarlo.");
                    return $this->renderAjax('_importForm',["model"=>$model]);   
                }//end if

                $modelUser  = User::findOne(Yii::$app->user->identity->id);
                $data       = $worksheet->toArray(null, true, true, true);
                $info       = [];
                $flag_error = false;
                $error_     = [];
                for ($i=2; $i <= count($data) ; $i++) {
                    $customersModel                   = new Customers();
                    $customersModel->cliente_id       = $modelUser->cliente_id;
                    $customersModel->razon_social     = $data[$i]["A"];
                    $customersModel->nombre_comercial = $data[$i]["B"];
                    $customersModel->email            = $data[$i]["R"];
                    $customersModel->telefono         = $data[$i]["Q"];
                    $customersModel->rfc              = $data[$i]["C"];
                    $customersModel->uso_cfdi         = $data[$i]["D"];
                    $customersModel->regimen_fiscal   = $data[$i]["E"];
                    $customersModel->forma_pago       = $data[$i]["F"];
                    $customersModel->comentarios      = null;
                    $customersModel->pais             = $data[$i]["O"];
                    $customersModel->estado           = strtoupper($data[$i]["N"]);
                    $customersModel->ciudad           = $data[$i]["L"];
                    $customersModel->municipio        = $data[$i]["K"];
                    $customersModel->codigo_postal    = $data[$i]["P"];
                    $customersModel->colonia          = $data[$i]["J"];
                    $customersModel->calle            = $data[$i]["G"];
                    $customersModel->no_exterior      = $data[$i]["H"];
                    $customersModel->no_interior      = $data[$i]["I"];
                    $customersModel->referencia       = $data[$i]["M"];
                    $customersModel->tipo             = $this->decodeTipoPersona($data[$i]["C"]);
                    $customersModel->estatus          = 1;

                    if ($customersModel->validate()) {
                        $validCustomer = $this->validInsertCustomer($data[$i]["C"],$modelUser->cliente_id);
                        if($validCustomer > 0){
                            if($data[$i]["C"] != "XAXX010101000" && $data[$i]["C"] != "XEXX010101000"){
                                $error_["rfc"] = ["EL RFC '{$data[$i]["C"]}' ya se encuentra en uso."];
                                $flag_error    = true;
                            }else{
                                if(isset($error_["rfc"])):
                                    unset($error_["rfc"]);
                                endif;
                                $flag_error    = false;
                            }//end if
                        }//end if

                        if(strlen($customersModel->forma_pago) < 2){
                            $error_["forma_pago"] = ["La clave de forma de pago no coincide con alguna dentro del catálogo propocionado por el SAT."];
                            $flag_error           = true;
                        }//end if

                        if(!isset(Yii::$app->params["countries"][$customersModel->pais])){
                            if(strtolower($customersModel->pais) == "méxico"  || strtolower($customersModel->pais) == "mexico"){
                                $customersModel->pais = "MEX";
                            }else{                            
                                $error_["pais"] = ["La clave del país no coincide con alguna dentro del catálogo propocionado por el SAT."];
                                $flag_error     = true;
                            }//end if
                        }//end if

                        if($customersModel->tipo == "FISICA"){
                            $valid_uso_cfdi       = isset(Yii::$app->params["uso_cfdi_fisica"][$customersModel->uso_cfdi]) ? true : false;
                            $valid_regimen_fiscal = isset(Yii::$app->params["regimen_fiscal_fisica"][$customersModel->regimen_fiscal]) ? true : false;
                        }elseif($customersModel->tipo =  "MORAL"){
                            $valid_uso_cfdi       = isset(Yii::$app->params["uso_cfdi_moral"][$customersModel->uso_cfdi]) ? true : false;
                            $valid_regimen_fiscal = isset(Yii::$app->params["regimen_fiscal_moral"][$customersModel->regimen_fiscal]) ? true : false;
                        }elseif($customersModel->tipo =  "GENERICO"){
                            $valid_uso_cfdi       = isset(Yii::$app->params["uso_cfdi_generico"][$customersModel->uso_cfdi]) ? true : false;
                            $valid_regimen_fiscal = isset(Yii::$app->params["regimen_fiscal_generico"][$customersModel->regimen_fiscal]) ? true : false;
                        }//end if

                        if(!$valid_uso_cfdi){
                            $error_["uso_cfdi"] = ["USO de CFDI, no es valido para el tipo de persona fiscal"];
                            $flag_error         = true;
                        }//end if

                        if(!$valid_regimen_fiscal){
                            $error_["regimen_fiscal"] = ["Regimen Fiscal, no es valido para el tipo de persona fiscal"];
                            $flag_error               = true;
                        }//end if

                        if($flag_error == true){
                            $info[$i] = ["rfc"=>$data[$i]["C"],"razon_social"=>$data[$i]["A"],"errors"=>$error_];
                        }else{
                            $customersModel->save();
                            $info[$i] = ["rfc"=>$customersModel->rfc,"razon_social"=>$customersModel->razon_social,"errors"=>false];
                        }//end if

                    } else {
                        $info[$i] = ["rfc"=>$data[$i]["C"],"razon_social"=>$data[$i]["A"],"errors"=>$customersModel->errors];
                    }
                }//end foreach

                if(!$flag_error){
                    $type_flash = "success";
                    $msg_flash = "El archivo <strong>".$model["excelFile"]->name."</strong> se importo conrrectamente.";
                }else{
                    $type_flash = "danger";
                    $msg_flash = "El archivo <strong>".$model["excelFile"]->name."</strong> contiene algunos errores, por favor verifique la información que aparece abajo, realice los ajustes y vuelva a intentarlo.";
                }
                Yii::$app->session->setFlash($type_flash, $msg_flash);
                return $this->renderAjax('_importForm',["model"=>$model,"info"=>$info]);
            }
        }//end if

        return $this->render('import',["model"=>$model]);
    }//end if

    /**
     * Displays a single Customers model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    private function decodeTipoPersona($rfc = null){
        $rfc_length = strlen($rfc);
        if($rfc_length == 12){
            return  "MORAL";
        }elseif($rfc_length == 13){
            if($rfc == "XAXX010101000" || $rfc == "XEXX010101000"){
                return "GENERICO";
            }
            return "FISICA";
        }
    }//end function

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model       = new Customers();
        $modelUser   = User::findOne(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post()) ) {
            //return $this->redirect(['view', 'id' => $model->id]);
            $validCustomerRFC = $this->validInsertCustomer($model->rfc,$modelUser->cliente_id);
            if($validCustomerRFC > 0){
                if($model->rfc != "XAXX010101000" && $model->rfc != "XEXX010101000"){
                    Yii::$app->session->setFlash('danger', "EL RFC :  <strong>".$model->rfc."</strong> ya se encuentra en uso.</strong>");
                    //return $this->redirect(['index']);
                    return $this->renderAjax('create', [
                        'model' => $model,
                    ]);
                }//end if
            }//end if

            $model->tipo = $this->decodeTipoPersona($model->rfc);
            $model->save();
            return $this->redirect(['index']);
        }

        $model->cliente_id = $modelUser->cliente_id;
        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost){
            if($model->rfc != Yii::$app->request->post()["Customers"]["rfc"]){
                $validCustomerRFC = $this->validInsertCustomer($model->rfc,$model->cliente_id);
                if($validCustomerRFC > 0){
                    if($model->rfc != "XAXX010101000" && $model->rfc != "XEXX010101000"){
                        Yii::$app->session->setFlash('danger', "EL RFC :  <strong>".Yii::$app->request->post()["Customers"]["rfc"]."</strong> ya se encuentra en uso.</strong>");
                        return $this->renderAjax('update', [
                            'model' => $model,
                        ]);
                    }//end if
                }//end if
            }//end if

            if ($model->load(Yii::$app->request->post())) {
                $model->tipo = $this->decodeTipoPersona($model->rfc);
                $model->save();
                Yii::$app->session->setFlash('success', "Se actualizo correctamente la información para :  <strong>".$model->razon_social."</strong>");
                return $this->redirect(['index']);
            }//end if
        }//end if


        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    public function actionGetopciones(){
        $uso_cfdi       = Yii::$app->request->post()["cfdi"];
        $regimen_fiscal = Yii::$app->request->post()["rf"];


        $opt_cfdi    = Yii::$app->params[$uso_cfdi];
        $opt_regimen = Yii::$app->params[$regimen_fiscal];

        $opt_html_cfdi = "<option value=''>-- Selecciona una opción --</option>";
        foreach ($opt_cfdi as $key => $option) {
            $opt_html_cfdi .= "<option value='{$key}'>{$option}</option>";
        }//end foreach

        $opt_html_regimen = "<option value=''>-- Selecciona una opción --</option>";
        foreach ($opt_regimen as $key => $option) {
            $opt_html_regimen .= "<option value='{$key}'>{$option}</option>";
        }//end foreach

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ["opt_cfdi"=>$opt_html_cfdi,"opt_regimen"=>$opt_html_regimen];
    }//end function

    public function actionGetestadosbypais(){
        $code_countrie = Yii::$app->request->post()["clave_pais"];
        $states        = Yii::$app->params['states'][$code_countrie];

        $opt_html_states = "<option value=''>-- Selecciona una estado --</option>";
        foreach ($states as $key => $option) {
            $opt_html_states .= "<option value='{$key}'>{$option}</option>";
        }//end foreach
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ["states"=>$opt_html_states];
    }//end function

    /**
     * Deletes an existing Customers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id){

        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->estatus = 2;
        $model->save();
        Yii::$app->session->setFlash('success', "Se elimino el cliente :  <strong>".$model->razon_social."</strong>");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
