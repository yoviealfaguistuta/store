<?php

use common\models\MstJenisBarang;
use common\models\MstKategoriBarang;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MstKategoriBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-kategori-barang-index">
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
            [
                'attribute' => 'jenis_id',
                'value' => function($data){
                    /* @var $data MstKategoriBarang*/
                    return $data->jenisName;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'data' => MstJenisBarang::optionLists(),
                    'options' => ['placeholder' => '...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ],
            ],
            'name',
            'code',
            'tag',
            //'description:ntext',
            'created_at:datetime',
            'created_by',
            //'updated_at',
            //'updated_by',
        ],
    ]); ?>


</div>
