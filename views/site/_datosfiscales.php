<?php 
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>
<div class="datosfiscales-create">
    <div class="row">
        <div class="col-12 bg-white">
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

            <!-- Content -->
            <div class="row justify-content-center border border-secodnary border-top-0">
                <div class="col-lg-12 col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1 class="card-title"><strong><i class="nav-icon fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Datos Fiscales</strong></h1>
                        </div>
                        <?php 
                            $form = ActiveForm::begin([
                                'enableAjaxValidation' => false,
                                'action'               =>['saveempresa'],
                                'options'              =>[
                                    'enctype' => 'multipart/form-data',
                                    'id'      => 'datosFiscalesForm',
                                    'class'   => 'ajax-form'
                                ]
                            ]);
                        ?>
                        <div class="datosfiscales-form card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <h3>Empresa</h3>
                                </div>
                                <?php echo $form->field($modelEmpresa, 'user_id')->hiddenInput(['value' => Yii::$app->session->get('user')["id"]])->label(false); ?>
                                <?php echo $form->field($modelEmpresa, 'razon_social',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Razón Social'])->label('Nombre o Razón Social *'); ?>
                                <?php echo $form->field($modelEmpresa, 'nombre',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Nombre Comercial'])->label('Nombre Comercial *'); ?>
                                <?php echo $form->field($modelEmpresa, 'rfc',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'RFC'])->label('RFC *'); ?>
                                <?php echo $form->field($modelEmpresa, 'curp',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'CURP'])->label('CURP *'); ?>

                                <div class="col-12 mt-4">
                                    <h3>Domicilio</h3>
                                </div>
                                <?php echo $form->field($modelEmpresa, 'calle',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Calle'])->label('Calle'); ?>
                                <?php echo $form->field($modelEmpresa, 'no_exterior',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Número Exterior'])->label('Número Exterior *'); ?>
                                <?php echo $form->field($modelEmpresa, 'no_interior',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Número Interior'])->label('Número Interior'); ?>
                                <?php echo $form->field($modelEmpresa, 'codigo_postal',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Código Postal'])->label('Código Postal *'); ?>
                                <?php echo $form->field($modelEmpresa, 'colonia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Colonia'])->label('Colonia *'); ?>
                                <?php echo $form->field($modelEmpresa, 'localidad',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Ciudad'])->label('Ciudad *'); ?>
                                <?php echo $form->field($modelEmpresa, 'municipio',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Municipio'])->label('Municipio *'); ?>
                                <?php echo $form->field($modelEmpresa, 'estado',['options'=>['class'=>'col-12 col-md-3 mt-3']])->dropDownList(Yii::$app->params['states'], ['class'=>'form-control','prompt' => 'Seleccione una opción'])->label('Estado *');?>
                                <?php echo $form->field($modelEmpresa, 'pais',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'País'])->label('País *'); ?>
                                <?php echo $form->field($modelEmpresa, 'referencia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['placeholder' => 'Referencia'])->label('Referencia *'); ?>

                                <div class="col-12 mt-4">
                                    <h3>Información de Facturación</h3>
                                </div>
                                <?php echo $form->field($modelEmpresa, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-3 mt-3']])->dropDownList(Yii::$app->params['regimen_fiscal'],['class'=>'form-control','prompt' => 'Seleccione una opción'])->label('Regimen Fiscal *');?>
                            </div>
                            <div class="bg-white card-footer" align="right">
                                <?php echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['class' => 'btn btn-primary rounded-pill']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <!-- //Content -->
        </div>
        <!--.card-->
    </div>
</div>
