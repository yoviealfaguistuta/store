<?php

use backend\models\SpesifikasiForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MstBarang */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelsImage common\models\MstBarangImage[] */
/* @var $modelsSpesifikasi SpesifikasiForm[]*/

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .item-no").each(function(index) {
        jQuery(this).html((index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .item-no").each(function(index) {
        jQuery(this).html((index + 1))
    });
});
';

$this->registerJs($js, $this::POS_END);

$this->registerCss('textarea {resize: none;}');
?>

<div class="mst-barang-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?=$form->field($model, 'kategori_id')->widget(Select2::classname(), [
                        'data' => \common\models\MstKategoriBarang::optionLists(),
                        'options' => ['placeholder' => 'Select ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])?>
                </div>

                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-2">
                    <?= $form->field($model, 'price')->textInput() ?>
                </div>
            </div>

            <?= $form->field($model, 'garansi')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'short_description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'include')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'exclude')->textarea(['rows' => 6]) ?>



            <?= $form->field($model, 'long_description')->widget(TinyMce::className(), [
                'options' => ['rows' => 6],
                'language' => 'id',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]);?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Spesification</strong></div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'id' => 'SpecDf',
                'widgetContainer' => 'dynamicform_wrapper_spec', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items-spec', // required: css class selector
                'widgetItem' => '.item-spec', // required: css class
                //'limit' => 4, // the maximum times, an element can be cloned (default 999)
                //'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item-spec', // css class
                'deleteButton' => '.remove-item-spec', // css class
                'model' => $modelsSpesifikasi[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'key',
                    'value'
                ],
            ]);?>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th class="text-center" style="width: 90px;">
                        <button type="button" class="add-item-spec btn btn-success btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </th>
                </tr>
                </thead>
                <tbody class="container-items-spec">
                <?php foreach ($modelsSpesifikasi as $index => $modelSpesifikasi): ?>
                    <tr class="item-spec">
                        <td>
                            <?= $form->field($modelSpesifikasi, "[{$index}]key")->textInput()->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($modelSpesifikasi, "[{$index}]value")->textarea(['rows'=>3])->label(false) ?>
                        </td>
                        <td class="text-center vcenter" style="width: 90px; verti">
                            <button type="button" class="remove-item-spec btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php DynamicFormWidget::end();?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><strong>Images</strong></div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                //'limit' => 4, // the maximum times, an element can be cloned (default 999)
                //'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsImage[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'imageFile',
                ],
            ]);?>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th class="text-center" style="width: 90px;">
                        <button type="button" class="add-item btn btn-success btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </th>
                </tr>
                </thead>
                <tbody class="container-items">
                <?php foreach ($modelsImage as $index => $modelImage): ?>
                    <tr class="item">
                        <?php
                        // necessary for update action.
                        if (!$modelImage->isNewRecord) {
                            echo Html::activeHiddenInput($modelImage, "[{$index}]id");
                        }
                        ?>
                        <td class="item-no">1</td>
                        <td>
                            <?= $form->field($modelImage, "[{$index}]title")->textInput()->label(false) ?>
                        </td>
                        <td>
                            <?= $form->field($modelImage, "[{$index}]imageFile")->fileInput()->label(false) ?>
                        </td>
                        <td class="text-center vcenter" style="width: 90px; verti">
                            <button type="button" class="remove-item btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></span></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th class="text-center" style="width: 90px;">
                        <button type="button" class="add-item btn btn-success btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                    </th>
                </tr>
                </tfoot>
            </table>

            <?php DynamicFormWidget::end();?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
