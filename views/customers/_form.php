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

    <div class="row">
        <div class="col-12">
            <h3>Datos del Cliente</h3>
        </div>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'cliente_id')->hiddenInput()->label(false); ?>
        <?php echo $form->field($model, 'razon_social',['options'=>['class'=>'col-12 col-md-6']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('razon_social').$__required__); ?>
        <?php echo $form->field($model, 'nombre_comercial',['options'=>['class'=>'col-12 col-md-6']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('nombre_comercial')); ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'rfc',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('rfc').$__required__) ?>

        <?php 
            /*echo $form->field($model, 'uso_cfdi',['options'=>['class'=>'col-12 col-md-4 mt-3']])->dropDownList([], ['prompt'=>'-- Seleccione una opción --','disabled' => true])->label($model->getAttributeLabel('uso_cfdi').$__required__); */
        ?>

        <?php
            if(is_null($model->tipo)){
                $items         = [];
                $disabled_cfdi = true;
            }else{
                if($model->tipo == "MORAL"){
                    $items = Yii::$app->params["uso_cfdi_moral"];
                }
                if($model->tipo = "FISICA"){
                    $items = Yii::$app->params["uso_cfdi_fisica"];
                }//end if

                if($model->tipo = "GENERICO"){
                    $items = Yii::$app->params["uso_cfdi_generico"];
                }//end if
                $disabled_cfdi = false;
            }//end if
            echo $form->field($model, 'uso_cfdi',['options'=>['class'=>'col-12 col-md-4 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'uso_cfdi', 
                    'data'          => $items,
                    'options'       => ['class'=>'form-control','placeholder' => '-- Seleccione una opción --','disabled' => $disabled_cfdi],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('uso_cfdi').$__required__);
            ?>

        <?php 
            /*echo $form->field($model, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-4 mt-3']])->dropDownList([], ['prompt'=>'-- Seleccione una opción --','disabled' => true])->label($model->getAttributeLabel('regimen_fiscal').$__required__) */
        ?>

        <?php 
            if(is_null($model->tipo)){
                $items         = [];
                $disabled_regimen = true;
            }else{
                if($model->tipo == "MORAL"){
                    $items = Yii::$app->params["regimen_fiscal_moral"];
                }

                if($model->tipo = "FISICA"){
                    $items = Yii::$app->params["regimen_fiscal_fisica"];
                }//end if

                if($model->tipo = "GENERICO"){
                    $items = Yii::$app->params["regimen_fiscal_generico"];
                }//end if


                $disabled_regimen = false;
            }//end if
            echo $form->field($model, 'regimen_fiscal',['options'=>['class'=>'col-12 col-md-4 mt-3','style'=>'']])
                ->widget(Select2::classname(),[
                    'name'          => 'regimen_fiscal', 
                    'data'          => $items,
                    'options'       => ['class'=>'form-control','placeholder' => '-- Seleccione una opción --','disabled' => $disabled_regimen],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('regimen_fiscal').$__required__);
            ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'telefono',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('telefono')); ?>
         <?php echo $form->field($model, 'email',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('email')); ?>
    </div>
    <br>
    <div class="row mt-4">
        <div class="col-12">
            <h3>Dirección Fiscal</h3>
        </div>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'pais',['options'=>['class'=>'col-12 col-md-3 mt-3','style'=>'']])
                    ->widget(Select2::classname(),[
                        'name' => 'pais',
                        'data' => Yii::$app->params['countries'],
                        'options'       => ['placeholder' => '-- Seleccione un país --'],
                        'pluginOptions' => [
                            'allowClear'    => true,
                        ],
                    ])
                    ->label($model->getAttributeLabel('pais')); ?>
        
        <?php
            if($model->pais == "MEX" || $model->pais == "USA" || $model->pais == "CAN"){
                $estados_items         = Yii::$app->params["states"][$model->pais];
                $disabled_select_state = false;
                $display_select_state  = 'display:block';
            }else{
                $estados_items         = [];
                $disabled_select_state = true;
                $display_select_state  = 'display:none';
            }//end if
            echo $form->field($model, 'estado',['options'=>['class'=>'col-12 col-md-3 mt-3','id'=>'customers-estado-selectdiv','style'=>$display_select_state]])
                ->widget(Select2::classname(),[
                    'name'          => 'estado', 
                    'data'          => $estados_items,
                    'options'       => ['placeholder' => '-- Seleccione un estado --','disabled'=>$disabled_select_state],
                    'pluginOptions' => [
                        'allowClear'    => true,
                    ],
                ])
                ->label($model->getAttributeLabel('estado'));
            ?>

        <?php
            if($model->pais != "MEX" && $model->pais != "USA" && $model->pais != "CAN"){
                $disabled_input_state = false;
                $display_input_state = 'display:block';
            }else{
                $disabled_input_state = true;
                $display_input_state = 'display:none';
            }//end if
            echo $form->field($model, 'estado',['options'=>['class'=>'col-12 col-md-3 mt-3','id'=>'customers-estado-textdiv','style'=>$display_input_state]])->textInput(['disabled' => $disabled_input_state,'id'=>'customers-estado-textinput'])->label($model->getAttributeLabel('estado')); ?>

        <?php echo $form->field($model, 'ciudad',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('ciudad')) ?>
        <?php echo $form->field($model, 'municipio',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('municipio')) ?>
    </div>
    <div class="row">
        <?php echo $form->field($model, 'codigo_postal',['options'=>['class'=>'col-12 col-md-2 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('codigo_postal').$__required__) ?>
        <?php echo $form->field($model, 'colonia',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('colonia')) ?>
        <?php echo $form->field($model, 'calle',['options'=>['class'=>'col-12 col-md-3 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('calle')) ?>
        <?php echo $form->field($model, 'no_exterior',['options'=>['class'=>'col-12 col-md-2 mt-3']])->textInput(['maxlength' => true])->label($model->getAttributeLabel('no_exterior')) ?>
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
    <div class="row mt-4 justify-content-end">
        <?php echo $form->field($model, 'estatus',['options'=>["class"=>"col-lg-3 col-md-12"]])->dropDownList(["1"=>"Activo","0"=>"Inactivo"], ['class' => 'estatus_opt']); ?>
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
$URL_opcionespais = Url::to(['customers/getestadosbypais']);
$js = <<<JS
$(document).ready(function(){
    $("#customers-rfc").on('keyup change', function(e) {
        var uppercase = $(this).val().toUpperCase();
        $(this).val(uppercase);

        var _rfc_    = $(this).val().length;
        var type_rfc = {};
        var flag_rfc= false;
        if(_rfc_ == 12){
            type_rfc = {"cfdi":"uso_cfdi_moral","rf":"regimen_fiscal_moral"};
            flag_rfc = true;
        }else if(_rfc_ == 13){
            if(uppercase == "XAXX010101000" || uppercase == "XEXX010101000"){
                type_rfc = {"cfdi":"uso_cfdi_generico","rf":"regimen_fiscal_generico"};
                flag_rfc = true;
            }else{            
                type_rfc = {"cfdi":"uso_cfdi_fisica","rf":"regimen_fiscal_fisica"};
                flag_rfc = true;
            }//end if
        }else{
            $("#customers-uso_cfdi").attr('disabled',true);
            $("#customers-regimen_fiscal").attr('disabled',true);
            type_rfc = {};
            flag_rfc = false;
        }//end if

        if(flag_rfc == true){
            $.ajax({
                url: '{$URL_opcionescfdi}', // Reemplaza con la URL adecuada
                type: 'post',
                data: type_rfc,
                beforeSend: function(){},
                success: function(response) {
                    $('#customers-uso_cfdi').html(response.opt_cfdi);
                    $("#customers-uso_cfdi").attr("disabled", false);

                    $('#customers-regimen_fiscal').html(response.opt_regimen);
                    $("#customers-regimen_fiscal").attr("disabled", false);
                }
            });
        }
    });

    $("#customers-pais").on('change', function(e){
        var pais = $(this).val();
        if(pais == "MEX" || pais == "USA" || pais == "CAN"){
            $("#customers-estado-textdiv").hide();
            $("#customers-estado-textinput").attr("disabled",true);
            $("#customers-estado-selectdiv").show();
            $("#customers-estado").attr("disabled",false);

            $.ajax({
                url: '{$URL_opcionespais}', // Reemplaza con la URL adecuada
                type: 'post',
                data: {'clave_pais':pais},
                beforeSend: function(){
                    console.log("buscando estados by pais");
                },
                success: function(response) {
                    $('#customers-estado').html(response.states);
                }
            });
        }else{
            $("#customers-estado-selectdiv").hide();
            $('#customers-estado').attr("disabled","true");

            $("#customers-estado-textdiv").show();
            $("#customers-estado-textinput").attr('disabled', false);
        }//end if
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
                $("#divEditForm").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
            },
            success: function(response) {
                // Actualizar la sección de la página con la respuesta
                $('#divEditForm').html(response);
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
