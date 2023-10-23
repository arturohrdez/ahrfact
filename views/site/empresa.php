<?php
use yii\helpers\Url;
$this->title = 'Configuración';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
	<div class="col-12">
		<div class="card card-dark card-tabs">
			<div class="card-header p-0 pt-1">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a id="empTab1" data-toggle="tab" data-id="1"  class="tabconf nav-link active" aria-current="page" href="javascript:void(0);">
							<i class="fas fa-file-invoice"></i> Datos Fiscales
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="tab" data-id="2"  class="tabconf nav-link" href="javascript:void(0);">
							<i class="fas fa-percentage"></i> Impuestos
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="tab" data-id=3 class="tabconf nav-link" href="javascript:void(0);">
							<i class="fas fa-certificate"></i> Certificados
						</a>
					</li>
					<!-- <li class="nav-item">
						<a data-toggle="tab" data-id=4  class="tabconf nav-link" href="javascript:void(0);">
							Admin SAT
						</a>
					</li> -->
					<li class="nav-item">
						<a data-toggle="tab" data-id="5"  class="tabconf nav-link" href="javascript:void(0);">
							<i class="fas fa-wrench"></i> Preferencias
						</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li> -->
				</ul>
			</div>
			<div class="card-body">
				<div id="content" class="tab-content">
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$URL_Empresa   = Url::to(['site/datosfiscales']);
$script = <<< JS
$(function(e){
	$("#empTab1").trigger('click');
});

$(".tabconf").on("click",function(e){
	var id = $(this).data("id");
	var uri_render =  "";
	switch (id) {
		case 1:
			// code...
			uri_render = "{$URL_Empresa}";
			break;
		default:
			// code...
			uri_render = "{$URL_Empresa}";
			break;
	}//end switch
	console.log(uri_render);

	$.ajax({
		url     : uri_render,
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
