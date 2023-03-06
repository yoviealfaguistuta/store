<?php


namespace api\controllers;


use common\components\DefaultImage;
use common\models\MstJenisBarangImage;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ImageJenisController extends CorsController
{
    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionThumb($id){
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;
        $response->headers->add('Pragma', 'public');
        $response->headers->add('Expires', '0');
        $response->headers->add('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->headers->add('Content-Transfer-Encoding', 'binary');

        $model = MstJenisBarangImage::findOne($id);
        if ($model !==null){
            $response->headers->set('content-type', $model->image_type);
            $response->data = stream_get_contents($model->thumb);
        }else{
            $response->data = stream_get_contents(fopen('data:image/png;base64,' . DefaultImage::noImage(),'r'));
            $response->getHeaders()->set('content-type', 'image/png');
            return $response;
        }


        return $response;
    }

    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionSmall($id){
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;
        $response->headers->add('Pragma', 'public');
        $response->headers->add('Expires', '0');
        $response->headers->add('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->headers->add('Content-Transfer-Encoding', 'binary');

        $model = MstJenisBarangImage::findOne($id);
        if ($model !==null){
            $response->headers->set('content-type', $model->image_type);
            $response->data = stream_get_contents($model->small);
        }else{
            $response->data = stream_get_contents(fopen('data:image/png;base64,' . DefaultImage::noImage(),'r'));
            $response->getHeaders()->set('content-type', 'image/png');
            return $response;
        }


        return $response;
    }

    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionOriginal($id){
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;
        $response->headers->add('Pragma', 'public');
        $response->headers->add('Expires', '0');
        $response->headers->add('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->headers->add('Content-Transfer-Encoding', 'binary');

        $model = MstJenisBarangImage::findOne($id);
        if ($model !==null){
            $response->headers->set('content-type', $model->image_type);
            $response->data = stream_get_contents($model->original);
        }else{
            $response->data = stream_get_contents(fopen('data:image/png;base64,' . DefaultImage::noImage(),'r'));
            $response->getHeaders()->set('content-type', 'image/png');
            return $response;
        }


        return $response;
    }
    /**
     * Finds the MstBarangImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MstJenisBarangImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstJenisBarangImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}