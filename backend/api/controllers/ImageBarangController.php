<?php
namespace api\controllers;

use common\models\MstBarangImage;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
*/
class ImageBarangController extends CorsController
{
    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionThumb($id){
        $model = $this->findModel($id);

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;

        $response->data = stream_get_contents($model->thumb);
        $response->headers->set('content-type', $model->image_type);
        $response->headers->add('Pragma', 'public');
        $response->headers->add('Expires', '0');
        $response->headers->add('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
        $response->headers->add('Content-Transfer-Encoding', 'binary');

        return $response;
    }

    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionSmall($id){
        $model = $this->findModel($id);

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;

        $response->data = stream_get_contents($model->small);
        $response->getHeaders()->set('content-type', $model->image_type);

        return $response;
    }

    /**
     * @param $id
     * @return \yii\console\Response|Response
     * @throws NotFoundHttpException
     */
    public function actionOriginal($id){
        $model = $this->findModel($id);

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_RAW;

        $response->data = stream_get_contents($model->original);
        $response->getHeaders()->set('content-type', $model->image_type);

        return $response;
    }

    /**
     * Finds the MstBarangImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MstBarangImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstBarangImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}