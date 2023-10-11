<?php
use yii\helpers\Url;
$this->title = 'Configuración';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
	<div class="col-12">
		<ul class="nav nav-tabs nav-fill nav-light">
			<li class="nav-item">
				<a id="empTab1" data-toggle="tab" data-id="1"  class="tabconf nav-link active" aria-current="page" href="javascript:void(0);">Datos Fiscales</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="2"  class="tabconf nav-link" href="javascript:void(0);">Impuestos</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id=3 class="tabconf nav-link" href="javascript:void(0);">Certificados</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id=4  class="tabconf nav-link" href="javascript:void(0);">Admin SAT</a>
			</li>
			<li class="nav-item">
				<a data-toggle="tab" data-id="5"  class="tabconf nav-link" href="javascript:void(0);">Preferencias</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li> -->
		</ul>
	</div>
</div>

<div id="content"></div>


<?php
$URL_Empresa   = Url::to(['site/empresa']);
$script = <<< JS
$(function(e){
	$("#empTab1").trigger('click');
});

$(".tabconf").on("click",function(e){
	var id = $(this).data("id");
	$.ajax({
		url     : "{$URL_Empresa}",
		type    : 'GET',
		dataType: 'HTML',
		data    : {"id":id},
		beforeSend: function(data){
			$("#content").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
		},
		success: function(response) {
			$("#content").html(response);
			//console.log(response);
		}
	});
});
JS;
$this->registerJs($script);
