<?php
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\bootstrap5\ActiveForm;

$this->title = 'Mi Cuenta';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-12">
		<ul class="nav nav-tabs nav-fill navbar-light">
			<li class="nav-item">
				<a id="profTab1" data-toggle="tab" data-id="1"  class="tabconf nav-link active" aria-current="page" href="javascript:void(0);">Datos Personales</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="2"  class="tabconf nav-link" href="javascript:void(0);">Datos de Acceso</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="3"  class="tabconf nav-link" href="javascript:void(0);">Nueve Empresa</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="4"  class="tabconf nav-link" href="javascript:void(0);">Usuarios Adicionales</a>
			</li>
			<!-- <li class="nav-item">
				<a data-toggle="tab" data-id=3 class="tabconf nav-link" href="javascript:void(0);">Certificados</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id=4  class="tabconf nav-link" href="javascript:void(0);">Admin SAT</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="5"  class="tabconf nav-link" href="javascript:void(0);">Preferencias</a>
			</li> -->
			<!-- <li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li> -->
		</ul>
	</div>
</div>

<div id="profContent"></div>

<?php
$URL_Datospersonales = Url::to(['site/datospersonales']);
$URL_Datosacceso     = Url::to(['site/datosacceso']);
$script = <<< JS
$(function(e){
	$("#profTab1").trigger('click');
});

$(".tabconf").on("click",function(e){
	var id = $(this).data("id");
	var uri_render =  "";
	switch (id) {
		case 1:
			// code...
			uri_render = "{$URL_Datospersonales}";
			break;
		case 2:
			// code...
			uri_render = "{$URL_Datosacceso}";
			break;
		default:
			// code...
			uri_render = "{$URL_Datospersonales}";
			break;
	}


	$.ajax({
		url     : uri_render,
		type    : 'POST',
		dataType: 'HTML',
		data    : {"id":id},
		beforeSend: function(data){
			$("#profContent").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
		},
		success: function(response) {
			$("#profContent").html(response);
			//console.log(response);
		}
	});
});
JS;
$this->registerJs($script);

