<?php

use kartik\dialog\Dialog;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarang */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Dialog::widget(['overrideYiiConfirm' => true]);

$shortStr = '';
if(!empty($model->short_description)){
    $shortStr = '<ul>';
    foreach (explode(',', $model->short_description) as $short) {
        $shortStr .= '<li>'.$short.'</li>';
    }
    $shortStr .= '</ul>';
}

$includeStr = '';
if(!empty($model->include)){
    $includeStr = '<ul>';
    foreach (explode(',', $model->include) as $include) {
        $includeStr .= '<li>'.$include.'</li>';
    }
    $includeStr .= '</ul>';
}

$excludeStr = '';
if(!empty($model->exclude)){
    $excludeStr = '<ul>';
    foreach (explode(',', $model->exclude) as $exclude) {
        $excludeStr .= '<li>'.$exclude.'</li>';
    }
    $excludeStr .= '</ul>';
}
?>
<div class="mst-barang-view">

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
            'kategoriName',
            'name',
            'code',
            'price:decimal',
            [
                'label' => $model->getAttributeLabel('short_description'),
                'value' => $shortStr,
                'format' => 'html'
            ],
            [
                'attribute' => 'long_description',
                'format' => 'html'
            ],
            'garansi',
            [
                'label' => $model->getAttributeLabel('include'),
                'value' => $includeStr,
                'format' => 'html'
            ],
            [
                'label' => $model->getAttributeLabel('exclude'),
                'value' => $excludeStr,
                'format' => 'html'
            ],
        ],
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Spesification</strong></div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tbody>
                <?php
                try {
                    $specs = Json::decode($model->spesifikasi);
                }catch (Throwable $t){
                    $specs = null;
                }
                if($specs !== null){
                    foreach (Json::decode($model->spesifikasi) as $key => $spec){
                        echo '<tr>';
                        echo '<td>'.$key.'</td>';
                        echo '<td>'.$spec.'</td>';
                        echo '</tr>';
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Thumb</strong></div>
        <div class="panel-body">
            <?php foreach ($model->mstBarangImages as $mstBarangImage):?>
                <img src="<?=$mstBarangImage->imageThumbUrl?>" alt="<?=$mstBarangImage->title?>" title="<?=$mstBarangImage->title?>">
            <?php endforeach;?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Small</strong></div>
        <div class="panel-body">
            <?php foreach ($model->mstBarangImages as $mstBarangImage):?>
                <img src="<?=$mstBarangImage->imageSmallUrl?>" alt="<?=$mstBarangImage->title?>" title="<?=$mstBarangImage->title?>">
            <?php endforeach;?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Original</strong></div>
        <div class="panel-body">
            <?php foreach ($model->mstBarangImages as $mstBarangImage):?>
                <img src="<?=$mstBarangImage->imageOriginalUrl?>" alt="<?=$mstBarangImage->title?>" title="<?=$mstBarangImage->title?>">
            <?php endforeach;?>
        </div>
    </div>

</div>
