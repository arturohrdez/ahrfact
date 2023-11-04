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

            <!-- <div class="progress" style="display: none;">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <span class="progress-text">Cargando...</span>
                </div>
            </div> -->

            <!-- <div id="upload-response" style="display: none;"></div> -->
        </div>    		
    </div>


    <?php
    if(isset($info)){
    ?>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Reporte de errores en la importación.</h2>
                </div>

                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 10%;" class="text-center">Fila</th>
                                <th style="width: 20%;" >RFC</th>
                                <th style="width: 30%;">Razón Social</th>
                                <th style="width: 40%;">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($info as $fila => $error) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $fila; ?></td>
                                    <td><?php echo $error["rfc"]; ?></td>
                                    <td><?php echo $error["razon_social"]; ?></td>
                                    <td>
                                        <?php
                                            if(!$error["errors"]){
                                                echo '<span class="alert-success">Importado Exitosamente</span>';
                                            }else{
                                                foreach ($error["errors"] as $error_detail) {
                                                    echo $error_detail[0]."<br>";
                                                }//end foreach
                                            }//end if
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }//end foreach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php 
    }//end if 
    ?>
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