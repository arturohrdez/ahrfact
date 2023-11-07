<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>

<div class="card-header">
    <div class="col-12">
       <strong><h2>Instrucciones y requerimientos para una importación exitosa.</h2></strong>
   </div>
</div>

<div class="card-body pad table-responsive">
    <!-- <div class="row">
        <div class="col-12">
            <div class="alert bg-yellow text-center">
                Importante: <b>'Nombre o Razón Social' , 'RFC' , 'Uso CFDI' , 'Régimen Fiscal' y 'Código Postal'</b> son campos obligatorios. 
            </div>
        </div>
    </div> -->
    <div class="row mt-3">
        <div class="col-12">
            <ul>
                <li>Descarga aquí la <?php echo Html::a('plantilla base', $url = Url::to('/sistema/index'), ['class' => 'text-primary']); ?>, para que te sirva como referencia de cómo debe crearse el archivo de Excel. </li>
                <li>Importante: <b>'Nombre o Razón Social' , 'RFC' , 'Uso CFDI' , 'Régimen Fiscal' y 'Código Postal'</b> son campos obligatorios.</li>
                <li>No borres, ni cambies el nombre de los títulos, ni el orden de las columnas.</li>
                <li>Para agregar clientes nuevos y no cuenten con RFC puede agregarlos con el RFC genérico que proporciona el SAT <b>XAXX010101000</b></li>
                <li>Si deseas agregar un cliente extranjero utiliza el RFC genérico que proporciona el SAT <b>XEXX010101001</b></li>
                <li>En el caso de los RFC genéricos, puedes repetirlos con varios clientes sólo cambias los datos del cliente para que se guarde cada uno.</li>
                <li>No deberá repetirse ningún RFC, excepto los RFC genéricos, que se mencionan en los puntos 2 y 3.</li>
                <li>El sistema ignorará filas que tengan RFC ya registrados o inválidos.</li>
                <li><b>"Uso CFDI SAT"</b> - Ésta columna es un nuevo requerimiento obligatorio del SAT, para capturar la clave del Uso del CFDI que le dará tu cliente, puedes ubicarla <?php echo Html::a('¡Aquí!', $url = Url::to('/sistema/index'), ['class' => 'text-primary']); ?>.</li>
                <li><b>"Regimen Fiscal SAT"</b> - Ésta columna es un nuevo requerimiento obligatorio del SAT. Para capturar el Regimen Fiscal del CFDI que le dará tu cliente, puedes ubicarla <?php echo Html::a('¡Aquí!', $url = Url::to('/sistema/index'), ['class' => 'text-primary']); ?> </li>
                <li><b>"Codigo Postal"</b> - Se debe registrar el código postal del domicilio fiscal de tu cliente. Lo puedes ver en su Constancia de Situacion Fiscal.</li>
                <li><b>"Forma de Pago"</b> - Si tu cliente no cuenta con forma de pago puede capturar "NA" para indicar al sistema que el cliente no tiene forma de pago, pero en caso que desee incluírla, debes capturar los números correspondientes según el catálogo Formas de Pago del SAT que puedes consultar <?php echo Html::a('¡Aquí!', $url = Url::to('/sistema/index'), ['class' => 'text-primary']); ?></li>
                <li>Sólo deberás elegir una sola forma de pago, aunque tu cliente realice el pago con varias formas, deberás elegir la que represente la mayor parte de los ingresos de la factura.</li>
                <li><b>"Contacto, Calle, NoExterior, NoInterior, Colonia, Municipio, Ciudad, Referencia, Estado, País, Código Postal, Teléfono"</b> Todas éstas son columnas que incluyen datos de contacto de tus clientes, así como su domicilio fiscal que aparecerá en la factura que le generes.</li>
                <li>Cuando se captura un Código Postal éste debe de contener 5 dígitos. Ejemplo: 07090. </li>
                <li>
                    <b>En caso de errores, se muestra un informe al finalizar la importación de su archivo. No olvides revisarlo, pues ahí se te indica que fila(s) no pudieron ser importadas.</b>
                </li>
                <li><b>Evita subir el mismo archivo varias veces, sin antes haber revisado el informe. Pues así evitarás crear clientes duplicados.</b></li>
            </ul>
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
                    <?php echo Html::submitButton('<i class="fas fa-file-upload"></i>&nbsp;&nbsp;&nbsp;Subir archivo', ['id'=>'btn-uploadfile','class' => 'btn btn-primary rounded-pill']); ?>
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
                                                $a = 1;
                                                foreach ($error["errors"] as $error_detail) {
                                                    echo $a."- ".$error_detail[0]."<br>";
                                                    $a++;
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
                    $("#btn-uploadfile").html('<i class="fas fa-file-upload"></i>&nbsp;&nbsp;&nbsp;Procesando ...');
                    console.log("enviando archivo");
                    $("#btn-uploadfile").attr("disabled","true");
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