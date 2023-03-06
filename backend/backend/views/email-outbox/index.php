<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EmailOutboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Outboxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-outbox-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'panel' => [
            'heading' => Html::encode($this->title),
            'type' => 'default',
            'before'=>Html::a('<i class="glyphicon glyphicon-refresh"></i>', ['index'], ['class' => 'btn btn-default']),
            //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            //'footer'=>false
        ],
        'toolbar' => [
            [
                'content'=>
                    Html::a('Create Email Outbox', ['create'], ['class' => 'btn btn-success']) .
                    Html::a('Send', ['cron'], ['class' => 'btn btn-success']),
                'options' => ['class' => 'btn-group']
            ],
            //'{export}',
            //'{toggleData}'
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            ['class' => 'kartik\grid\ActionColumn', 'template'=>'{view}'],

            'id',
            'email:email',
            'subject',
            //'content:ntext',
            'processed:boolean',
            'created_at:datetime',
            'processed_at:datetime',
        ],
    ]); ?>


</div>
