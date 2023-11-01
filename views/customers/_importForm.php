<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>

<div class="card-header">
    <div class="col-12">
       <strong><h2>Importa aquí tu catálogo de clientes.</h2></strong>
   </div>
</div>

<div class="card-body pad table-responsive">
    <div class="row">
        <div class="col-12">
            <b>Importante: 'Nombre o Razón Social'</b>, <b>'RFC'</b> , <b>'Uso CFDI'</b> y<b>Régimen Fiscal</b> son campos obligatorios. 
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <?php $form = ActiveForm::begin([
                'options' => ['id'=>'customersFormUpload','enctype' => 'multipart/form-data'],
            ]); ?>

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

            <?php echo $form->field($model, 'excelFile')->fileInput() ?>

            <div class="row">
                <div class="col-12 text-center">
                    <?php echo Html::submitButton('<i class="fas fa-file-upload"></i>&nbsp;&nbsp;&nbsp;Subir archivo', ['class' => 'btn btn-primary rounded-pill']); ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="progress" style="display: none;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <span class="progress-text">Cargando...</span>
                </div>
            </div>

            <div id="upload-response" style="display: none;"></div>
        </div>    		
    </div>
</div>

<?php
$URL_customersimport = Url::to(['customers/import']);
$js = <<<JS
    $(document).ready(function(){
        $("#customersFormUpload").on('beforeSubmit',function(e){
            e.preventDefault(); 
            var form     = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                url: '{$URL_customersimport}', // Reemplaza con la URL adecuada
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    console.log("enviando archivo");
                },
                success: function(response) {
                    $("#render_importForm").html(response);
                    //console.log(response);
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