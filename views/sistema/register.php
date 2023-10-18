<?php 
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;


?>
<div class="card card-outline card-danger text-dark">
	<div class="card-header text-center">
		<div class="h1 text-dark"><b>AHR</b>Fact</div>
	</div>
	<div class="card-body">
		<div class="login-box-msg text-center text-uppercase">
			<h5>Registrate como nuevo cliente.</h5>
		</div>

		<?php 
		if(Yii::$app->session->hasFlash('success')){
		?>
			<div class="row">
				<div class="col-12">
					<?php echo Yii::$app->session->getFlash('success') ?>
				</div>
			</div>
		<?php
		}else{//end if
		?>

		<?php 
		$form = ActiveForm::begin(['id' => 'register-form']) 
		?>
		<div class="row">
			<div class="col-12">
				<h5>Información General</h5>
			</div>
		</div>
		<div class="row">
			<?php echo $form->field($modelCliente, 'nombre',['options'=>['class'=>'col-12 col-md-4 mt-3']])->textInput(['placeholder' => 'Nombre(s)'])->label('Nombre(s)*'); ?>
			<?php echo $form->field($modelCliente,'apellidpPaterno', ['options' => ['class' => 'col-12 col-md-4 mt-3']])->label("Apellido Paterno *")->textInput(['placeholder' => 'Apellido Paterno']) ?>
			<?php echo $form->field($modelCliente,'apellidoMaterno', ['options' => ['class' => 'col-12 col-md-4 mt-3']])->label("Apellido Materno *")->textInput(['placeholder' => 'Apellido Materno']) ?>
		</div>
		<div class="row">
			<?php echo $form->field($modelCliente,'email', ['options' => ['class' => 'col-12 col-md-4 mt-3']])->label("Email *")->textInput(['placeholder' => 'Email']) ?>
			<?php echo $form->field($modelCliente,'telefono', ['options' => ['class' => 'col-12 col-md-4 mt-3']])->label("Teléfono")->textInput(['placeholder' => 'Teléfono']) ?>
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<h5>Datos de Acceso</h5>
			</div>
		</div>
		<div class="row">
			<?php echo $form->field($modelSignup, 'username',['options'=>['class'=>'col-12 col-md-6 mt-3']])->textInput(['placeholder'=>'Nombre de usuario'])->label('Nombre de usuario *'); ?>
	        <?php
	        	echo $form->field($modelSignup, 'password',['options'=>['class'=>'col-12 col-md-6 mt-3']])->passwordInput(['placeholder'=>'Password'])->label('Password *')
	        ?>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				<div class="bg-white card-footer text-right">
					<!-- <?php //echo Html::button('<i class="fas fa-times-circle"></i> Cancelar', ['class' => 'btn btn-secondary rounded-pill']) ?> -->
	                <?php echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['class' => 'btn btn-primary rounded-pill']) ?>
	            </div>
        	</div>
		</div>
		<?php 
		ActiveForm::end(); 
		}//end if
		?>
	</div>
</div>
