<?php

use common\models\MstBarang;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MstBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mst-barang-index">
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
                'label' => '_____Kategori_____',
                'attribute' => 'kategori_id',
                'value' => function($data){
                    /* @var $data MstBarang*/
                    return $data->kategoriName;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'data' => \common\models\MstKategoriBarang::optionLists(),
                    'options' => ['placeholder' => '...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ],
            ],
            'name',
            'code',
            'price:decimal',
            //'short_description:ntext',
            //'long_description:ntext',
            //'garansi',
            //'include:ntext',
            //'exclude:ntext',
            //'spesifikasi:ntext',
            'created_at:datetime',
            //'created_by',
            //'updated_at',
            //'updated_by',
        ],
    ]); ?>


</div>
