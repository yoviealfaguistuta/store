<?php

use kartik\widgets\Select2;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MstKategoriBarang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mst-kategori-barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'jenis_id')->widget(Select2::classname(), [
        'data' => \common\models\MstJenisBarang::optionLists(),
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => ['allowClear' => true],
    ])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, "imageFile")->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
