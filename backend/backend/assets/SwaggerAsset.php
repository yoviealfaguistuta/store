<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class SwaggerAsset extends AssetBundle
{
    public $basePath = '@webroot/swagger';
    public $baseUrl = '@web/swagger';
    public $css = [
        'swagger-ui.css',
    ];
    public $js = [
        'swagger-ui-bundle.js',
        'swagger-ui-standalone-preset.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        AppAsset::class,
    ];
}
