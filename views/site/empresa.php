<?php
use yii\helpers\Url;
$this->title = 'Configuración';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="row">
	<div class="col-12">
		<ul class="nav nav-tabs nav-fill nav-light">
			<li class="nav-item">
				<a data-toggle="tab" data-id="1"  class="tabconf nav-link active" aria-current="page" href="javascript:void(0);">Datos Fiscales</a>
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

<div id="content" class="row">
	<div class="col-12">
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita recusandae dolore possimus explicabo id, libero cupiditate beatae veniam non omnis, quis nisi nobis fugiat quos harum quod illum, ex nulla?
	</div>
</div>


<?php
$script = <<< JS
$(".tabconf").on("click",function(e){
	var id = $(this).data("id");

});
JS;
$this->registerJs($script);
