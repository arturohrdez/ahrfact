<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
?>
<div class="card card-outline card-primary text-dark ">
	<div class="card-header">
		<div class="card-title"><h4>Ajustes Generales</h4></div>
	</div>
	<div class="card-body">
		<p class="card-text text-gray">
			Edita tu infirmación personal.
		</p>
		<?php 
		$form = ActiveForm::begin(['id' => 'profile-form','enableAjaxValidation' => false]);
		?>
		<div class="row">
			<div class="col-12">
				<h5>Datos Personales</h5>
			</div>
		</div>
		<div class="row">
			<?php echo $form->field($modelProfile, 'id')->hiddenInput()->label(false); ?>
			<?php echo $form->field($modelProfile, 'name',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Nombre(s)','class'=>'form-control readonly_mod'])->label('Nombre(s) *'); ?>
			<?php echo $form->field($modelProfile, 'firstname',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Apellido Paterno','class'=>'form-control readonly_mod'])->label('Apellido Paterno *'); ?>
			<?php echo $form->field($modelProfile, 'lastname',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Apellido Materno','class'=>'form-control readonly_mod'])->label('Apellido Materno *'); ?>
			<?php echo $form->field($modelProfile, 'email',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Email','class'=>'form-control readonly_mod'])->label('Email *'); ?>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<div class="bg-white card-footer text-right">
	                <?php 
	                	echo Html::button('<i class="fas fa-user-edit"></i> Editar Información', ['id'=>'btnEditProfile','class' => 'btn btn-outline-info rounded-pill']);
	                	echo Html::button('<i class="fas fa-times"></i> Cancelar', ['id'=>'btnCencelProfile','class' => 'btn btn-danger rounded-pill','style'=>'display:none;']);
	                	echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['id'=>"btnSaveProfile",'class' => 'btn btn-primary rounded-pill ml-3','style'=>'display:none;']);
	                ?>
	            </div>
        	</div>
		</div>
		<?php 
		ActiveForm::end(); 
		?>
	</div>
</div>

<?php
$js = <<<JS
	$("#btnEditProfile").on("click",function(e){
		$(this).hide();
		$(".readonly_mod").attr("readonly",false);
		$("#btnSaveProfile, #btnCencelProfile").show();
	});

	$("#btnCencelProfile").on("click",function(e){
		location.reload();
		/*$(".readonly_mod").attr("readonly",true);
		$("#btnSaveProfile, #btnCencelProfile").hide();
		$("#btnEditProfile").show();*/
	});
JS;

$this->registerJs($js);
?>