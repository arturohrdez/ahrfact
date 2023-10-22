<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;

/*echo "<pre>";
var_dump($modelUser->attributes);
echo "</pre>";*/
?>

<div class="card card-outline card-primary text-dark ">
	<div class="card-header">
		<div class="card-title"><h4>Datos de Acceso</h4></div>
	</div>
	<div class="card-body">
		<p class="card-text text-gray text-center">
			Edita tus datos de acceso, puedes cambiar tu contraseña.
		</p>
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card card-widget widget-user shadow">
					<div class="widget-user-header bg-info">
						<h3 class="widget-user-username font-weight-bold">
							<?php echo $modelUser->name." ".$modelUser->firstname." ".$modelUser->lastname; ?>
						</h3>
						<div class="mt-3">
							<span class="font-weight-bold">Nombre de usaurio</span> <br>
							<span class="widget-user-desc">
								<?php echo $modelUser->username; ?>
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-12 card-body">
							<?php 
							$form = ActiveForm::begin(['id' => 'profileresetpass-form','enableAjaxValidation' => false]);
							?>
							<?php if (Yii::$app->session->hasFlash('success')): ?>
								<div class="row justify-content-center" align="center">
									<div class="col-lg-12">
										<div class="alert bg-teal alert-dismissable">
											<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
											<i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('success') ?>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<?php if (Yii::$app->session->hasFlash('danger')): ?>
								<div class="row justify-content-center" align="center">
									<div class="col-lg-12">
										<div class="alert bg-danger alert-dismissable">
											<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
											<i class="icon fa fa-check"></i> <?= Yii::$app->session->getFlash('danger') ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php echo $form->field($modelResetPass, 'id')->hiddenInput()->label(false); ?>
							<div class="row">
								<?php echo $form->field($modelResetPass, 'password',['options'=>['class'=>'col-11 mt-3']])->passwordInput(['placeholder' => 'Contraseña Actual','class'=>'form-control mod-pass'])->label('Contraseña Actual *'); ?>
								<div class="col-1 mt-5 pt-1 text-center">
									<a id="showPass" href="javascript:;" class="text-gray" title="Ver Contraseñas" data-status="0">
										<i class="btn-mod-pass fas fa-eye-slash"></i>
									</a>
								</div>
							</div>
							<div class="row">
								<?php echo $form->field($modelResetPass, 'newPassword',['options'=>['class'=>'col-11 mt-3']])->passwordInput(['placeholder' => 'Nueva Contrtaseña','class'=>'form-control mod-new-pass'])->label('Nueva Contraseña *'); ?>
								<div class="col-1 mt-5 pt-1 text-center">
									<a id="showNewPass" href="javascript:;" class="text-gray" title="Ver Contraseñas" data-status="0">
										<i class="btn-modnew-pass fas fa-eye-slash"></i>
									</a>
								</div>
							</div>
							<div class="row">
								<?php echo $form->field($modelResetPass, 'confirmPassword',['options'=>['class'=>'col-11 mt-3']])->passwordInput(['placeholder' => 'Confirmar Nueva Contrtaseña','class'=>'form-control mod-confirm-pass'])->label('Confirmar Nueva Contraseña *'); ?>
								<div class="col-1 mt-5 pt-1 text-center">
									<a id="showConfirmPass" href="javascript:;" class="text-gray" title="Ver Contraseñas" data-status="0">
										<i class="btn-modconfirm-pass fas fa-eye-slash"></i>
									</a>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-12">
									<div class="bg-white card-footer text-right">
										<?php 
										echo Html::submitButton('<i class="fas fa-check-circle"></i> Guardar', ['id'=>"btnSavePass",'class' => 'btn btn-primary rounded-pill ml-3']);
										?>
									</div>
								</div>
							</div>
							<?php 
							ActiveForm::end(); 
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$URL_Datosacceso = Url::to(['site/datosacceso']);
$js = <<<JS
	$("#showPass").on("click",function(e){
		var status = $(this).data("status");
		if(status == "0"){
			$(this).data('status', '1');
			$(".mod-pass").attr('type', 'text');
			$(".btn-mod-pass").removeClass('fa-eye-slash').addClass('fa-eye');
		}else if(status == "1"){
			$(this).data('status', '0');
			$(".mod-pass").attr('type', 'password');
			$(".btn-mod-pass").removeClass('fa-eye').addClass('fa-eye-slash');
		}//end if
	});

	$("#showNewPass").on("click",function(e){
		var status = $(this).data("status");
		if(status == "0"){
			$(this).data('status', '1');
			$(".mod-new-pass").attr('type', 'text');
			$(".btn-modnew-pass").removeClass('fa-eye-slash').addClass('fa-eye');
		}else if(status == "1"){
			$(this).data('status', '0');
			$(".mod-new-pass").attr('type', 'password');
			$(".btn-modnew-pass").removeClass('fa-eye').addClass('fa-eye-slash');
		}//end if
	});

	$("#showConfirmPass").on("click",function(e){
		var status = $(this).data("status");
		if(status == "0"){
			$(this).data('status', '1');
			$(".mod-confirm-pass").attr('type', 'text');
			$(".btn-modconfirm-pass").removeClass('fa-eye-slash').addClass('fa-eye');
		}else if(status == "1"){
			$(this).data('status', '0');
			$(".mod-confirm-pass").attr('type', 'password');
			$(".btn-modconfirm-pass").removeClass('fa-eye').addClass('fa-eye-slash');
		}//end if
	});

	$(document).ready(function(){
		$("#profileresetpass-form").on('beforeSubmit',function(e){
			e.preventDefault(); 
			var form     = $(this);
			var formData = form.serialize();

			$.ajax({
	            url: '{$URL_Datosacceso}', // Reemplaza con la URL adecuada
	            type: 'post',
	            data: formData,
	            beforeSend: function(){
	            	$("#profContent").html('<div class="row"><div class="col-12 bg-white p-5"><div class="row justify-content-center border border-secodnary border-top-0"><div class="spinner-border text-teal" role="status"></div></div></div></div>');
	            },
	            success: function(response) {
	                // Actualizar la sección de la página con la respuesta
	            	$('#profContent').html(response);
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