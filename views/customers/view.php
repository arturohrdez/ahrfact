<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row-fluid">
    <div class="col-xs-12">
        <div class="card card-danger">
            <div class="card-header">
                <h1 class="card-title"><strong>&nbsp;&nbsp;&nbsp;<?php echo Html::encode($model->razon_social) ?></strong></h1>
                <button type="button" class="btn close text-white" onclick='closeView()'>×</button>
            </div>
            <div class="contact-view card-body">
                <div class="col-12" align="right">
                    <?php echo  Html::button('<i class="fas fa-edit"></i>', ['value'=>Url::to(['update','id' => $model->id]),'class' => 'btn bg-teal btn-sm btnUpdateView', 'title'=>'Editar']) ?>
                    <?php echo Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => '¿Está seguro de eliminar este elemento?',
                                'method' => 'post',
                            ],
                        ]) ?>
                </div>
                <div class="col-12 pt-3">
                    <?php 
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id',
                            //'cliente_id',
                            'razon_social',
                            'nombre_comercial',
                            'rfc',
                            'uso_cfdi',
                            'regimen_fiscal',
                            'forma_pago',
                            'comentarios:ntext',
                            'pais',
                            'estado',
                            'ciudad',
                            'municipio',
                            'codigo_postal',
                            'colonia',
                            'calle',
                            'no_exterior',
                            'no_interior',
                            'referencia:ntext',
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="card-footer text-center">
                <?php echo Html::button('<i class="fas fa-times-circle"></i> Cerrar Vista',['value'=>'','class'=>'btn btn-primary rounded-pill cancelView', 'title'=>'Cerrar Vista']) ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*** Action Button Edit View ***/
    $(".btnUpdateView").on("click",function(e){
        $("#divEditForm").hide(function(e){});
        $("#btnAddForm").show(function(e){});
        $("#divEditForm").load($(this).attr('value'),function(e){
            $("#divEditForm").slideDown('slow');
        });
    });

    /*** Action Button Cancel-Close View ***/
    $(".cancelView").on("click",function(e){
         $("#divEditForm").slideUp(function(e){});
    });
</script>

