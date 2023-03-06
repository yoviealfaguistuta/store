<?php
namespace api\controllers;

use Yii;

class TestController extends CorsController {
    public function actionIndex(){
        return '$print';
    }
}