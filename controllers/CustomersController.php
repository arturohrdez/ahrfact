<?php

namespace app\controllers;

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;
use app\models\User;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

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

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model       = new Customers();
        $modelUser   = User::findOne(Yii::$app->user->identity->id);
        $model->pais = "México";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

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

    /**
     * Deletes an existing Customers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

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
