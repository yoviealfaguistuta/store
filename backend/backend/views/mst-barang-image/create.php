<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarangImage */

$this->title = 'Create Mst Barang Image';
$this->params['breadcrumbs'][] = ['label' => 'Mst Barang Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-barang-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
