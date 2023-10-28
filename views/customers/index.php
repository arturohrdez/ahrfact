<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="loading text-center"></div>
    <div id="divEditForm" class="col-sm-12 col-md-12 col-lg-8 offset-lg-2" style="display: none;"></div>
</div>

<div class="app\models\Customers-index">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="col-6 float-right pb-3">
                        <?= Html::button('<i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Nuevo Cliente', ['value' => Url::to('create'), 'class' => 'btn btn-primary float-right rounded-pill','id'=>'btnAddForm']) ?>
                    </div>
                </div>

                <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="row-fluid mt-2" align="center">
                        <div class="col-sm-12">
                            <div class="alert bg-teal alert-dismissable">
                               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                               <i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('success') ?>
                           </div>
                        </div>
                    </div>
               <?php endif; ?>

               <?php if (Yii::$app->session->hasFlash('danger')): ?>
                    <div class="row-fluid mt-2" align="center">
                        <div class="col-sm-12">
                            <div class="alert bg-danger alert-dismissable">
                               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                               <i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('danger') ?>
                           </div>
                        </div>
                    </div>
               <?php endif; ?>

                <div class="card-body pad table-responsive">


                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php 
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'cliente_id',
                            'razon_social',
                            'nombre_comercial',
                            'rfc',
                            //'uso_cfdi',
                            //'regimen_fiscal',
                            //'forma_pago',
                            //'comentarios:ntext',
                            //'pais',
                            //'estado',
                            //'ciudad',
                            //'municipio',
                            //'codigo_postal',
                            //'colonia',
                            //'calle',
                            //'no_exterior',
                            //'no_interior',
                            //'referencia:ntext',

                            [
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn',
                                'header'        => 'Actions',
                                'headerOptions' => ['style'=>'text-align:center'],
                                'contentOptions' => ['class'=>'text-center'],
                                'template'      => '{view} {update} {delete}',
                                'buttons'       => [
                                    'view'=>function($url,$model){
                                        return Html::button('<i class="fas fa-eye"></i>',['value'=>Url::to(['view', 'id' => $model->id]), 'class' => 'btn bg-teal btn-sm btnViewForm', 'title'=>'Consultar']);
                                    },
                                    'update'=>function ($url, $model) {
                                        return Html::button('<i class="fas fa-edit"></i>',['value'=>Url::to(['update','id' => $model->id]), 'class' => 'btn bg-teal btn-sm btnUpdateForm','title'=>'Editar']);
                                    },
                                    'delete'=>function ($url, $model) {
                                        return Html::a('<i class="fas fa-trash-alt"></i>', $url = Url::to(['delete','id' => $model->id]), ['class' => 'btn bg-danger btn-sm','title'=>'Eliminar','data-pajax'=>0, 'data-confirm'=>'¿Está seguro de eliminar este elemento?','data-method'=>'post']);
                                    },
                                ]

                            ],
                        ],
                        'rowOptions' => function($model, $key, $index, $grid){
                            if($model->estatus == 1){
                                return ['style' => 'background-color: #badbcc;'];
                            }elseif($model->estatus == 0){}
                                return ['style' => 'background-color: #f8d7da;'];
                        },
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap5\LinkPager',
                        ]
                    ]); 
                    ?>
                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
</div>


