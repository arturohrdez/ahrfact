<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>

<div class="card card-outline card-primary text-dark ">
    <div class="card-header">
        <div class="card-title"><h4>Datos Fiscales</h4></div>
    </div>
    <div class="card-body">
        <p class="card-text text-gray">
            Edita tu infirmación fiscal.
        </p>
        <?php 
        $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'options'              =>[
                'id'      => 'datosFiscalesForm',
                'class'   => 'ajax-form'
            ]
        ]);
        ?>
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="row justify-content-center" align="center">
                <div class="col-lg-12">
                    <div class="alert bg-teal alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('success') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('danger')): ?>
            <div class="row justify-content-center" align="center">
                <div class="col-lg-12">
                    <div class="alert bg-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('danger') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <h5>Empresa</h5>
            </div>
        </div>

        <div class="row">
            <?php echo $form->field($modelEmpresa, 'id')->hiddenInput()->label(false); ?>
            <?php echo $form->field($modelEmpresa, 'cliente_id')->hiddenInput(['value' => $modelUser->cliente_id])->label(false); ?>
            <?php echo $form->field($modelEmpresa, 'razon_social',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Razón Social'])->label('Nombre o Razón Social *'); ?>
            <?php echo $form->field($modelEmpresa, 'nombre',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Nombre Comercial'])->label('Nombre Comercial *'); ?>
            <?php echo $form->field($modelEmpresa, 'rfc',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'RFC','readonly'=>$readonly,'disabled'=>$readonly])->label('RFC *'); ?>
            <?php echo $form->field($modelEmpresa, 'curp',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'CURP'])->label('CURP *'); ?>
        </div>
        <div class="row">
            <div class="col-md-3 col-12"></div>
            <div class="col-md-3 col-12"></div>
            <div class="col-md-3 col-12 mt-2">
                <div class="alert alert-info">
                    *El campo "RFC" no puede ser modificado
                </div>
            </div>
            <div class="col-md-3 col-12"></div>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <h3>Domicilio</h3>
            </div>
        </div>

        <div class="row">
            <?php echo $form->field($modelEmpresa, 'calle',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Calle'])->label('Calle'); ?>
            <?php echo $form->field($modelEmpresa, 'no_exterior',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Número Exterior'])->label('Número Exterior *'); ?>
            <?php echo $form->field($modelEmpresa, 'no_interior',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Número Interior'])->label('Número Interior'); ?>
            <?php echo $form->field($modelEmpresa, 'codigo_postal',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Código Postal'])->label('Código Postal *'); ?>
            <?php echo $form->field($modelEmpresa, 'colonia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Colonia'])->label('Colonia *'); ?>
            <?php echo $form->field($modelEmpresa, 'localidad',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Ciudad'])->label('Ciudad *'); ?>
            <?php echo $form->field($modelEmpresa, 'municipio',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Municipio'])->label('Municipio *'); ?>
            <?php echo $form->field($modelEmpresa, 'estado',['options'=>['class'=>'col-12 col-md-3 mt-3']])->dropDownList(Yii::$app->params['states'], ['class'=>'form-control','prompt' => 'Seleccione una opción'])->label('Estado *');?>
            <?php echo $form->field($modelEmpresa, 'pais',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'País','readonly'=>true,'disabled'=>$readonly])->label('País *'); ?>
            <?php echo $form->field($modelEmpresa, 'referencia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Referencia'])->label('Referencia *'); ?>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <h3>Información de Facturación</h3>
            </div>
        </div>

        <div class="row">
            <?php echo $form->field($modelEmpresa, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-3 mt-3']])->dropDownList(Yii::$app->params['regimen_fiscal'],['class'=>'form-control','prompt' => 'Seleccione una opción'])->label('Regimen Fiscal *');?>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="bg-white card-footer text-right">
                    <?php echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['class' => 'btn btn-primary rounded-pill']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


<?php
$URL_Datosfiscales = Url::to(['site/datosfiscales']);
$js = <<<JS
    $(document).ready(function(){
        $("#empresa-rfc, #empresa-curp").on('keyup', function(e) {
            //console.log($(this).val());
            var uppercase = $(this).val().toUpperCase();
            $(this).val(uppercase);
        });

        $("#datosFiscalesForm").on('beforeSubmit',function(e){
            e.preventDefault(); 
            var form     = $(this);
            var formData = form.serialize();

            $.ajax({
                url: '{$URL_Datosfiscales}', // Reemplaza con la URL adecuada
                type: 'post',
                data: formData,
                beforeSend: function(){
                    $("#content").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
                },
                success: function(response) {
                    // Actualizar la sección de la página con la respuesta
                    $('#content').html(response);
                },
                error: function(erro) {
                    // Manejar errores de Ajax
                    console.log(erro);
                }
            });

            return false;
        });
    });

    $("#btnEditProfile").on("click",function(e){
        $(this).hide();
        $(".readonly_mod").attr("readonly",false);
        $("#btnSaveProfile, #btnCencelProfile").show();
    });

    $("#btnCencelProfile").on("click",function(e){
        location.reload();
    });
JS;

$this->registerJs($js);
?>

