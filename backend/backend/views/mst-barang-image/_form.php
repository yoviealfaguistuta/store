<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarangImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-barang-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'barang_id')->textInput() ?>

    <?= $form->field($model, 'image_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'original')->textInput() ?>

    <?= $form->field($model, 'small')->textInput() ?>

    <?= $form->field($model, 'thumb')->textInput() ?>

    <?= $form->field($model, 'is_main')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
