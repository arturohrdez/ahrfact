<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = "Importar Clientes";
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Agrega Dropzone.js desde un CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="col-6 float-left">
                    	<strong><h2>Importa aquí tu catálogo de clientes.</h2></strong>
                    </div>
                </div>

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

                <div class="card-body pad table-responsive">
                	<div class="row">
                		<div class="col-12">
                			<b>Importante: 'Nombre o Razón Social'</b>, <b>'RFC'</b> , <b>'Uso CFDI'</b> y<b>Régimen Fiscal</b> son campos obligatorios. 
                		</div>
                	</div>
                	<div class="row mt-3">
                		<div class="col-12">
                			<div class="dropzone" id="my-dropzone"></div>
                			<div id="upload-response"></div>
                		</div>    		
                	</div>
                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>

<?php
$script = <<<JS
Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#my-dropzone", {
    url: "{url/to/upload/action}", // Reemplaza "{url/to/upload/action}" con la URL a tu controlador para la carga de archivos
    paramName: "file",
    maxFilesize: 5, // Tamaño máximo del archivo en MB
    acceptedFiles: "image/*", // Tipos de archivo permitidos
    dictDefaultMessage: "Arrastra y suelta archivos aquí o haz clic para cargar",
    dictFallbackMessage: "Tu navegador no admite la carga de archivos con arrastrar y soltar.",
    // Agrega otras configuraciones según tus necesidades
});

myDropzone.on("success", function(file, response) {
    // Este evento se dispara cuando un archivo se carga exitosamente
    console.log("Archivo cargado exitosamente.", response);
    // Puedes realizar acciones adicionales aquí, como mostrar una vista previa o notificar al usuario
    var responseContainer = document.getElementById('upload-response');
    responseContainer.innerHTML = 'Archivo cargado exitosamente: ' + response;
});

myDropzone.on("error", function(file, errorMessage) {
    // Este evento se dispara en caso de un error de carga
    console.error("Error al cargar el archivo: " + errorMessage);
});
JS;

$this->registerJs($script);
?>
