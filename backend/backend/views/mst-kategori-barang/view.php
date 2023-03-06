<?php

use kartik\dialog\Dialog;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MstKategoriBarang */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Dialog::widget(['overrideYiiConfirm' => true]);
?>
<div class="mst-kategori-barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jenisName',
            'name',
            'code',
            'tag',
            'description:ntext',
            'created_at:datetime',
            'created_by',
            'updated_at:datetime',
            'updated_by',
        ],
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Thumb</strong></div>
        <div class="panel-body">
            <img src="<?=$model->imageThumbUrl?>" alt="<?=$model->name?>" title="<?=$model->name?>">
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Small</strong></div>
        <div class="panel-body">
            <img src="<?=$model->imageSmallUrl?>" alt="<?=$model->name?>" title="<?=$model->name?>">
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Original</strong></div>
        <div class="panel-body">
            <img src="<?=$model->imageOriginalUrl?>" alt="<?=$model->name?>" title="<?=$model->name?>">
        </div>
    </div>

</div>
