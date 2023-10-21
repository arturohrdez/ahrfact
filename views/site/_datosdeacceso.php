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
		<p class="card-text text-gray">
			Edita tus datos de acceso, puedes cambiar tu nombre de usuario y contraseña.
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
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
