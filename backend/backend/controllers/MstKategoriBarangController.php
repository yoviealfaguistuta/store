<?php

namespace backend\controllers;

use common\models\MstKategoriBarangImage;
use Yii;
use common\models\MstKategoriBarang;
use common\models\MstKategoriBarangSearch;
use yii\helpers\BaseVarDumper;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MstKategoriBarangController implements the CRUD actions for MstKategoriBarang model.
 */
class MstKategoriBarangController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MstKategoriBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstKategoriBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MstKategoriBarang model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MstKategoriBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MstKategoriBarang(['scenario'=>'create']);

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model->validate()){
                $modelImage = new MstKategoriBarangImage([
                    'image_type' => $model->imageFile->type,
                    'original' => file_get_contents($model->imageFile->tempName),
                    'small' => Image::resize($model->imageFile->tempName, 500, 500)->get($model->imageFile->extension),
                    'thumb' => Image::resize($model->imageFile->tempName, 100, 100)->get($model->imageFile->extension),
                ]);

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if(!$model->save(false)){
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (1)');
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    $modelImage->id = $model->id;
                    if(!$modelImage->save(false)){
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (2)');
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                }catch (\Throwable $t){
                    Yii::$app->session->setFlash('error', $t->getMessage());
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MstKategoriBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if($model->validate()){
                if($model->imageFile !== null){
                    if(!empty($model->mstKategoriBarangImage)){
                        $modelImage = $model->mstKategoriBarangImage;
                    }else{
                        $modelImage = new MstKategoriBarangImage(['id'=>$model->id]);
                    }

                    $modelImage->image_type = $model->imageFile->type;
                    $modelImage->original = file_get_contents($model->imageFile->tempName);
                    $modelImage->small = Image::resize($model->imageFile->tempName, 500, 500)->get($model->imageFile->extension);
                    $modelImage->thumb = Image::resize($model->imageFile->tempName, 100, 100)->get($model->imageFile->extension);

                    //BaseVarDumper::dump($modelImage->isNewRecord, 10, true);Yii::$app->end();

                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if(!($flag = $model->save(false))){
                            $transaction->rollBack();
                            Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (1)');
                            return $this->redirect(['view', 'id' => $model->id]);
                        }

                        if(!($flag = $modelImage->save(false))){
                            $transaction->rollBack();
                            Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (2)');
                            return $this->redirect(['view', 'id' => $model->id]);
                        }

                        if ($flag){
                            $transaction->commit();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    }catch (\Throwable $t){
                        Yii::$app->session->setFlash('error', $t->getMessage());
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }else{
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MstKategoriBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        MstKategoriBarangImage::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MstKategoriBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MstKategoriBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstKategoriBarang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
