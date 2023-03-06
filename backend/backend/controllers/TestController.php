<?php


namespace backend\controllers;


use common\models\MstJenisBarang;
use common\models\MstKategoriBarang;
use Yii;
use yii\helpers\BaseVarDumper;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        $data = [];
        $jenises = MstJenisBarang::find()->all();
        foreach ($jenises as $jenis) {
            /* @var $jenis MstJenisBarang*/
            foreach ($jenis->mstKategoriBarangs as $mstKategoriBarang) {
                /* @var $mstKategoriBarang MstKategoriBarang*/
                $data[$jenis->name][$mstKategoriBarang->id] = $mstKategoriBarang->name;
            }
        }

        BaseVarDumper::dump($data, 10, true);Yii::$app->end();
    }
}