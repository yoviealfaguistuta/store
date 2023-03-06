<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstKategoriBarang */

$this->title = 'Create Kategori Barang';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-kategori-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
