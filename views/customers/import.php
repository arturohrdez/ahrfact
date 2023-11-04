<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


$this->title = "Importar Clientes";
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="render_importForm" class="card card-primary card-outline">

                <?php echo $this->render('_importForm', [
                    'model' => $model
                ]) ?>

                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>


