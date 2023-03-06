<?php

use backend\models\SpesifikasiForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarang */
/* @var $modelsImage common\models\MstBarangImage[] */
/* @var $modelsSpesifikasi SpesifikasiForm[]*/

$this->title = 'Create Barang';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsImage' => $modelsImage,
        'modelsSpesifikasi' => $modelsSpesifikasi
    ]) ?>

</div>
