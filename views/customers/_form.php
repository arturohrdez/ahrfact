<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\bootstrap5\ActiveForm */
?>


<?php 
$form         = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'customersForm']]);
$__required__ = " <span class='text-danger'>*</span>";
?>
<div class="customers-form card-body">
    <div class="row">
        <div class="col-12">
            <h3>Datos del Cliente</h3>
        </div>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'cliente_id')->hiddenInput()->label(false); ?>
        <?php echo $form->field($model, 'razon_social',['options'=>['class'=>'col-12 col-md-6']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('razon_social').$__required__); ?>
        <?php echo $form->field($model, 'nombre_comercial',['options'=>['class'=>'col-12 col-md-6']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'rfc',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('rfc').$__required__) ?>

        <?php 
            /*echo $form->field($model, 'uso_cfdi',['options'=>['class'=>'col-12 col-md-4 mt-3']])->dropDownList([], ['prompt'=>'-- Seleccione una opción --','disabled' => true])->label($model->getAttributeLabel('uso_cfdi').$__required__); */
        ?>

        <?php echo $form->field($model, 'uso_cfdi',['options'=>['class'=>'col-12 col-md-4 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'uso_cfdi', 
                    'data'          => [],
                    'options'       => ['class'=>'form-control','placeholder' => '-- Seleccione una opción --','disabled' => true],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('uso_cfdi').$__required__);
            ?>

        <?php 
            /*echo $form->field($model, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-4 mt-3']])->dropDownList([], ['prompt'=>'-- Seleccione una opción --','disabled' => true])->label($model->getAttributeLabel('regimen_fiscal').$__required__) */
        ?>

        <?php echo $form->field($model, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-4 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'regimen_fiscal', 
                    'data'          => [],
                    'options'       => ['class'=>'form-control','placeholder' => '-- Seleccione una opción --','disabled' => true],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('regimen_fiscal').$__required__);
            ?>
    </div>
    <br>
    <div class="row mt-4">
        <div class="col-12">
            <h3>Dirección Fiscal</h3>
        </div>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'pais',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['disabled'=>true,'maxlength' => true])->label($model->getAttributeLabel('pais').$__required__) ?>
        
        <?php echo $form->field($model, 'estado',['options'=>['class'=>'col-12 col-md-3 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'ticket_id', 
                    'data'          => Yii::$app->params['states'],
                    'options'       => ['placeholder' => '-- Seleccione un estado --'],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('estado').$__required__);
            ?>

        <?php echo $form->field($model, 'ciudad',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('ciudad').$__required__) ?>
        <?php echo $form->field($model, 'municipio',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('municipio').$__required__) ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'codigo_postal',['options'=>['class'=>'col-12 col-md-2 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('codigo_postal').$__required__) ?>
        <?php echo $form->field($model, 'colonia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('colonia').$__required__) ?>
        <?php echo $form->field($model, 'calle',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('calle').$__required__) ?>
        <?php echo $form->field($model, 'no_exterior',['options'=>['class'=>'col-12 col-md-2 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('no_exterior').$__required__) ?>
        <?php echo $form->field($model, 'no_interior',['options'=>['class'=>'col-12 col-md-2 mt-3']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'referencia',['options'=>['class'=>'col-12 mt-3']])->textarea(['rows' => 3]) ?>
    </div>
    <br>
    <div class="row mt-4">
        <div class="col-12">
            <h3>Pago</h3>
        </div>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'forma_pago',['options'=>['class'=>'col-12 col-md-4 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'ticket_id', 
                    'data'          => Yii::$app->params['forma_pago'],
                    'options'       => ['placeholder' => '-- Seleccione una opción --'],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('forma_pago').$__required__);
            ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'comentarios',['options'=>['class'=>'col-12 col-md-12 mt-3']])->textarea(['rows' => 3]) ?>
    </div>
</div>

<div class=" card-footer" align="right">
    <div id="content"></div>
	<?=  Html::Button('<i class="fas fa-times-circle"></i> Cancelar', ['class' => 'btn btn-danger rounded-pill','id'=>'btnCloseForm','onClick'=>'closeForm("customersForm")']) ?>
    <?= Html::submitButton('<i class="fas fa-save"></i> Guardar Cliente', ['class' => 'btn btn-success rounded-pill']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php
$URL_opcionescfdi = Url::to(['customers/getopciones']);
$js = <<<JS
$(document).ready(function(){
    $("#customers-rfc").on('keyup', function(e) {
        //console.log($(this).val());
        var uppercase = $(this).val().toUpperCase();
        $(this).val(uppercase);

        var _rfc_    = $(this).val().length;
        var type_rfc = {};
        var flag_rfc= false;
        if(_rfc_ == 12){
            type_rfc = {"cfdi":"uso_cfdi_moral","rf":"regimen_fiscal_moral"};
            flag_rfc = true;
        }else if(_rfc_ == 13){
            type_rfc = "uso_cfdi_fisica";
            type_rfc = {"cfdi":"uso_cfdi_fisica","rf":"regimen_fiscal_fisica"};
            flag_rfc = true;
        }else{
            $("#customers-uso_cfdi").attr('disabled',true);
            type_rfc = {};
            flag_rfc = false;
        }//end if

        if(flag_rfc == true){
            console.log(type_rfc);
            $.ajax({
                url: '{$URL_opcionescfdi}', // Reemplaza con la URL adecuada
                type: 'post',
                data: type_rfc,
                beforeSend: function(){
                    //$(".field-customers-uso_cfdi").prepend('<i class="text-primary loader fas fa-spinner fa-pulse"></i>');
                    //$(".field-customers-regimen_fiscal").prepend('<i class="text-primary loader fas fa-spinner fa-pulse"></i>');
                    //console.log("buscando datos uso cfdi");
                },
                success: function(response) {
                    $(".loader").remove();
                    // Actualizar la sección de la página con la respuesta
                    $('#customers-uso_cfdi').html(response.opt_cfdi);
                    $("#customers-uso_cfdi").attr("disabled", false);

                    $('#customers-regimen_fiscal').html(response.opt_regimen);
                    $("#customers-regimen_fiscal").attr("disabled", false);


                }
            });
        }
    });


    $("#customersForm").on('beforeSubmit',function(e) {
        e.preventDefault();
        var form     = $(this);
        var formData = form.serialize();

        var actionForm = $(this).attr('action');
        $.ajax({
            url: actionForm, // Reemplaza con la URL adecuada
            type: 'post',
            data: formData,
            beforeSend: function(){
                $(".customers-create").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
            },
            success: function(response) {
                // Actualizar la sección de la página con la respuesta
                $('.customers-create').html(response);
            },
            error: function(erro) {
                // Manejar errores de Ajax
                console.log(erro);
            }
        });
        return false;
    });

});
JS;
$this->registerJs($js);
?>
