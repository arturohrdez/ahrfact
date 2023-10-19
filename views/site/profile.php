<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Mi Cuenta';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-orange text-dark ">
	<div class="card-header">
		<div class="card-title"><h4>Ajustes Generales</h4></div>
	</div>
	<div class="card-body">
		<p class="card-text text-gray">
			Edita tu infirmación general, y/o cambia tu contraseña en caso de ser necesario.
		</p>
		<?php 
		$form = ActiveForm::begin(['id' => 'profile-form']) 
		?>
		<div class="row">
			<div class="col-12">
				<h5>Datos Personales</h5>
			</div>
		</div>
		<div class="row">
			<?php echo $form->field($modelProfile, 'name',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Nombre(s)'])->label('Nombre(s) *'); ?>
			<?php echo $form->field($modelProfile, 'firstname',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Apellido Paterno'])->label('Apellido Paterno *'); ?>
			<?php echo $form->field($modelProfile, 'lastname',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Apellido Materno'])->label('Apellido Materno *'); ?>
			<?php echo $form->field($modelProfile, 'email',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['readonly'=>$readonly,'placeholder' => 'Email'])->label('Email *'); ?>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<div class="bg-white card-footer text-right">
					<!-- <?php //echo Html::button('<i class="fas fa-times-circle"></i> Cancelar', ['class' => 'btn btn-secondary rounded-pill']) ?> -->
	                <?php 
	                	echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['class' => 'btn btn-primary rounded-pill','style'=>'display:none;']);
	                ?>
	            </div>
        	</div>
		</div>
		<?php 
		ActiveForm::end(); 
		?>

	</div>
</div>