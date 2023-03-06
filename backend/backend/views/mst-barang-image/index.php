<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MstBarangImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mst Barang Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-barang-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mst Barang Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'barang_id',
            'image_type',
            'original',
            'small',
            //'thumb',
            //'is_main:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
