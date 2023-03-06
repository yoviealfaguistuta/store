<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarangImage */

$this->title = 'Update Mst Barang Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mst Barang Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-barang-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
