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
                    <div class="row">
                        <div class="col-12">
                            <h3>Datos del Cliente</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <label><?php echo $model->getAttributeLabel('razon_social'); ?></label> <br>
                            <?php echo $model->razon_social; ?>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <label><?php echo $model->getAttributeLabel('nombre_comercial'); ?></label><br>
                            <?php echo $model->nombre_comercial; ?>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <label><?php echo $model->getAttributeLabel('rfc'); ?></label><br>
                            <?php echo $model->rfc; ?>
                        </div>
                        <div class="col-md-12 col-lg-4 mt-2">
                            <label><?php echo $model->getAttributeLabel('uso_cfdi'); ?></label> <br>
                            <?php 
                                if(strlen($model->rfc) == 12){
                                    echo Yii::$app->params["uso_cfdi_moral"][$model->uso_cfdi];
                                }elseif(strlen($model->rfc) == 13){
                                    echo Yii::$app->params["uso_cfdi_fisica"][$model->uso_cfdi];
                                }
                            ?>
                        </div>
                        <div class="col-md-12 col-lg-4 mt-2">
                            <label><?php echo $model->getAttributeLabel('regimen_fiscal');?></label> <br>
                            <?php 
                                if(strlen($model->rfc) == 12){
                                    echo Yii::$app->params["regimen_fiscal_moral"][$model->regimen_fiscal];
                                }elseif(strlen($model->rfc) == 13){
                                    echo Yii::$app->params["regimen_fiscal_fisica"][$model->regimen_fiscal];
                                }//end if
                            ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <h3>Dirección Fiscal</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-3">
                            <label><?php echo $model->getAttributeLabel('pais'); ?></label><br>
                            <?php echo $model->pais; ?>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <label><?php echo $model->getAttributeLabel('estado'); ?></label><br>
                            <?php echo $model->estado; ?>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <label><?php echo $model->getAttributeLabel('ciudad'); ?></label><br>
                            <?php echo $model->ciudad; ?>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <label><?php echo $model->getAttributeLabel('municipio'); ?></label><br>
                            <?php echo $model->municipio; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('codigo_postal'); ?></label><br>
                            <?php echo $model->codigo_postal; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('colonia'); ?></label><br>
                            <?php echo $model->colonia; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('calle'); ?></label><br>
                            <?php echo $model->calle; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('no_exterior'); ?></label><br>
                            <?php echo $model->no_exterior; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('no_interior'); ?></label><br>
                            <?php echo $model->no_interior; ?>
                        </div>
                        <div class="col-md-12 col-lg-3 mt-2">
                            <label><?php echo $model->getAttributeLabel('referencia'); ?></label><br>
                            <?php echo $model->referencia; ?>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <h3>Pago</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label><?php echo $model->getAttributeLabel('forma_pago'); ?></label><br>
                            <?php echo $model->forma_pago; ?>
                        </div>
                        <div class="col-12 mt-2">
                            <label><?php echo $model->getAttributeLabel('comentarios'); ?></label><br>
                            <?php echo $model->comentarios; ?>
                        </div>
                    </div>
                    <?php 

                    /*echo DetailView::widget([
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
                    ])*/ ?>
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

