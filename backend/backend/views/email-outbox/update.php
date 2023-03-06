<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmailOutbox */

$this->title = 'Update Email Outbox: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Email Outboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="email-outbox-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
