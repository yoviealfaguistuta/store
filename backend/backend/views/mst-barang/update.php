<?php

use backend\models\SpesifikasiForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarang */
/* @var $modelsImage common\models\MstBarangImage[] */
/* @var $modelsSpesifikasi SpesifikasiForm[]*/

$this->title = 'Update Barang: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mst-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsImage' => $modelsImage,
        'modelsSpesifikasi' => $modelsSpesifikasi
    ]) ?>

</div>
