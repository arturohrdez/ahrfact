<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">
            <h1><?= Html::encode($this->title) ?></h1>
        </p>
        <p>Please fill out the following fields to signup:</p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

