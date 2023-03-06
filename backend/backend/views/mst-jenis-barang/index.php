<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MstJenisBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-jenis-barang-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'resizableColumns' => false,
        'panel' => [
            'heading' => $this->title,
            'type' => 'default',
            'before'=>Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-default']),
            //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            //'footer'=>false
        ],
        'toolbar' => [
            [
                'content'=> Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']),
                'options' => ['class' => 'btn-group']
            ],
            //'{export}',
            //'{toggleData}'
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            ['class' => 'kartik\grid\ActionColumn', 'template'=>'{view}'],

            'id',
            'name',
            'code',
            'tag',
            //'description:ntext',
            'created_at:datetime',
            //'created_by',
            //'updated_at',
            //'updated_by',
        ],
    ]); ?>


</div>
