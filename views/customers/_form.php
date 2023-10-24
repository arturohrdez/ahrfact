<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\bootstrap5\ActiveForm */
?>


    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'customersForm']]); ?>

<div class="customers-form card-body">
    <?= $form->field($model, 'cliente_id')->textInput() ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_comercial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uso_cfdi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regimen_fiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forma_pago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_exterior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_interior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'referencia')->textarea(['rows' => 6]) ?>

</div>
<div class=" card-footer" align="right">
	<?=  Html::Button('<i class="fas fa-times-circle"></i> Cancelar', ['class' => 'btn btn-danger','id'=>'btnCloseForm','onClick'=>'closeForm("customersForm")']) ?>
    <?= Html::submitButton('<i class="fas fa-check-circle"></i> Aceptar', ['class' => 'btn btn-success']) ?>
</div>

    <?php ActiveForm::end(); ?>

