<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = 'Nuevo Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="customers-create">
    <div class="row-fluid">
        <div class="col-sm-12">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h1 class="card-title"><strong><i class="nav-icon fa fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;<?= Html::encode($this->title) ?></strong></h1>
                    <button type="button" class="btn close text-white" onclick='closeForm("customersForm")'>×</button>
                </div>
                <?=$this->render('_form', [
                    'model' => $model
                ]) ?>
            </div>
        </div>
        <!--.card-->
    </div>
</div>