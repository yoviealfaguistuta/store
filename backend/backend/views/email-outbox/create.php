<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmailOutbox */

$this->title = 'Create Email Outbox';
$this->params['breadcrumbs'][] = ['label' => 'Email Outboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-outbox-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
