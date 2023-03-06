<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;

/**
 * Controller yang mengizinkan CORS
 *
 * @OA\Info(
 *  title="",
 *  version="",
 * )
 */
class CorsController extends Controller
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => Yii::$app->params['cors_origin'],
                    //'Origin' => ['*'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET', 'OPTIONS', 'DELETE'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['Content-Type', 'Authorization'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],

            ],
        ];
    }
}