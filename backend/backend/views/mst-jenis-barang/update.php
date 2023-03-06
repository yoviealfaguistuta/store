<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstJenisBarang */

$this->title = 'Update Jenis Barang: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-jenis-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
