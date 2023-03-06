<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-be-api',
    'name' => 'kecamatan-be-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => [
        'log',
        [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
                //'application/xml' => \yii\web\Response::FORMAT_XML,
            ],
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                /*[
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'site',
                        'test',
                    ],
                    'pluralize'=>false,
                ],*/

                'GET test' => 'test/index', //'OPTIONS test' => 'test/index',

                'GET site/captcha' => 'site/captcha',
                'POST site/signup' => 'site/signup',

                'GET jenis-barang' => 'jenis-barang/index',
                'GET image-jenis/thumb/<id>' => 'image-jenis/thumb',
                'GET image-jenis/small/<id>' => 'image-jenis/small',
                'GET image-jenis/original/<id>' => 'image-jenis/original',

                'GET kategori-barang/<jenisId>' => 'kategori-barang/index',
                'GET image-kategori/thumb/<id>' => 'image-kategori/thumb',
                'GET image-kategori/small/<id>' => 'image-kategori/small',
                'GET image-kategori/original/<id>' => 'image-kategori/original',

                'GET barang' => 'barang/index',
                'GET barang/<id>' => 'barang/view',
                'GET image-barang/thumb/<id>' => 'image-barang/thumb',
                'GET image-barang/small/<id>' => 'image-barang/small',
                'GET image-barang/original/<id>' => 'image-barang/original',
            ],
        ],
    ],
    'params' => $params,
];
