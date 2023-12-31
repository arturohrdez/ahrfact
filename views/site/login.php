<?php
use yii\helpers\Html;
?>
<div class="card">
    <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="<?=Yii::$app->homeUrl?>"><b>AHR</b>Fact</a>
        </div>
        <!-- /.login-logo -->
        <h4 class="login-box-msg text-center font-weight-bold ">
            Acceso al Sistema
        </h4>
        <hr>

        <?php $form = \yii\bootstrap5\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-8">
                <?php echo $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-danger">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]);?>
            </div>
            <div class="col-12">
                <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-block bg-gradient-danger']) ?>
            </div>
        </div>

        <?php \yii\bootstrap5\ActiveForm::end(); ?>
        <div class="row">
            <div class="col-12">
                <div class="mt-3 text-right">
                    <a href="forgot-password.html" class="text-primary">¿Olvidasté tu contraseña?</a>
                </div>
            </div>
        </div>

        <!-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
            <a href="forgot-password.html" class="text-red">¿Olvidasté tu contraseña?</a>
        </p> -->
        <!-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
    </div>
    <!-- /.login-card-body -->
</div>