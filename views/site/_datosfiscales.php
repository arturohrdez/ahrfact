<?php 
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

?>
<div class="datosfiscales-create">
    <div class="row">
        <div class="col-12">
            <div class="card card-teal">
                <div class="card-header">
                    <h1 class="card-title"><strong><i class="nav-icon fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Datos Fiscales</strong></h1>
                </div>
                <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'datosFiscalesForm']]); ?>
                <?php echo $form->field($modelEmpresa, 'razon_social',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['placeholder' => 'Razón Social']); ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!--.card-->
    </div>
</div>