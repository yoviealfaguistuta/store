<?php

namespace backend\controllers;

use backend\models\SpesifikasiForm;
use common\models\Model;
use common\models\MstBarangImage;
use Yii;
use common\models\MstBarang;
use common\models\MstBarangSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseVarDumper;
use yii\helpers\Json;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * MstBarangController implements the CRUD actions for MstBarang model.
 */
class MstBarangController extends Controller
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
     * Lists all MstBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MstBarangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MstBarang model.
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
     * Creates a new MstBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MstBarang();
        $modelsImage = [new MstBarangImage(['scenario'=>'create'])];
        $modelsSpesifikasi = [new SpesifikasiForm()];

        if ($model->load(Yii::$app->request->post())) {
            $modelsSpesifikasi = Model::createMultiple(SpesifikasiForm::classname());
            Model::loadMultiple($modelsSpesifikasi, Yii::$app->request->post());

            $modelsImage = Model::createMultiple(MstBarangImage::classname());
            Model::loadMultiple($modelsImage, Yii::$app->request->post());

            foreach ($modelsImage as $index=>$modelImage) {
                /* @var $modelImage MstBarangImage*/
                $modelImage->imageFile = UploadedFile::getInstanceByName('MstBarangImage['.$index.'][imageFile]');
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsSpesifikasi) && $valid;
            $valid = Model::validateMultiple($modelsImage) && $valid;

            if ($valid) {
                $model->code = Yii::$app->security->generateRandomString(16);
                $model->spesifikasi = Json::encode(ArrayHelper::map($modelsSpesifikasi, 'key', 'value'));

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsImage as $modelImage) {
                            /* @var $modelImage MstBarangImage*/
                            $modelImage->barang_id = $model->id;
                            $modelImage->image_type = $modelImage->imageFile->type;
                            $modelImage->original = file_get_contents($modelImage->imageFile->tempName);
                            $modelImage->small = Image::resize($modelImage->imageFile->tempName, 500, 500)->get($modelImage->imageFile->extension);
                            $modelImage->thumb = Image::resize($modelImage->imageFile->tempName, 100, 100, false)->get($modelImage->imageFile->extension);
                            if (! ($flag = $modelImage->save(false))) {
                                $transaction->rollBack();
                                Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (1)');
                                return $this->redirect(['view', 'id' => $model->id]);
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Throwable $t) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', $t->getMessage());
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsImage' => (empty($modelsImage)) ? [new MstBarangImage(['scenario'=>'create'])] : $modelsImage,
            'modelsSpesifikasi' => (empty($modelsSpesifikasi)) ? [new SpesifikasiForm()] : $modelsSpesifikasi
        ]);
    }

    /**
     * Updates an existing MstBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsImage = $model->mstBarangImages;

        $modelsSpesifikasi = [];
        $specs = Json::decode($model->spesifikasi);
        foreach ($specs as $key=>$spec) {
            $modelsSpesifikasi[] = new SpesifikasiForm(['key'=>$key, 'value'=>$spec]);
        }

        foreach ($modelsImage as $index=>$modelImage) {
            /* @var $modelImage MstBarangImage*/
            $modelImage->scenario = 'update';
        }

        if ($model->load(Yii::$app->request->post())) {
            $modelsSpesifikasi = Model::createMultiple(SpesifikasiForm::classname());
            Model::loadMultiple($modelsSpesifikasi, Yii::$app->request->post());

            $oldIDs = ArrayHelper::map($modelsImage, 'id', 'id');
            $modelsImage = Model::createMultiple(MstBarangImage::classname(), $modelsImage);
            Model::loadMultiple($modelsImage, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsImage, 'id', 'id')));

            foreach ($modelsImage as $index=>$modelImage) {
                /* @var $modelImage MstBarangImage*/
                $modelImage->imageFile = UploadedFile::getInstanceByName('MstBarangImage['.$index.'][imageFile]');
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsSpesifikasi) && $valid;
            $valid = Model::validateMultiple($modelsImage) && $valid;

            if ($valid) {
                $model->code = Yii::$app->security->generateRandomString(16);
                $model->spesifikasi = Json::encode(ArrayHelper::map($modelsSpesifikasi, 'key', 'value'));

                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            MstBarangImage::deleteAll(['id' => $deletedIDs]);
                        }

                        foreach ($modelsImage as $modelImage) {
                            /* @var $modelImage MstBarangImage*/
                            $modelImage->barang_id = $model->id;
                            if(!empty($modelImage->imageFile)){
                                $modelImage->image_type = $modelImage->imageFile->type;
                                $modelImage->original = file_get_contents($modelImage->imageFile->tempName);
                                $modelImage->small = Image::resize($modelImage->imageFile->tempName, 500, 500, true, true)->get($modelImage->imageFile->extension);
                                $modelImage->thumb = Image::resize($modelImage->imageFile->tempName, 100, 100, false, true)->get($modelImage->imageFile->extension);
                            }
                            if (! ($flag = $modelImage->save(false))) {
                                $transaction->rollBack();
                                Yii::$app->session->setFlash('error', 'Gagal, coba lagi. (1)');
                                return $this->redirect(['view', 'id' => $model->id]);
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (\Throwable $t) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', $t->getMessage());
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsImage' => (empty($modelsImage)) ? [new MstBarangImage(['scenario'=>'update'])] : $modelsImage,
            'modelsSpesifikasi' => (empty($modelsSpesifikasi)) ? [new SpesifikasiForm()] : $modelsSpesifikasi
        ]);
    }

    /**
     * Deletes an existing MstBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        MstBarangImage::deleteAll(['barang_id'=>$model->id]);

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MstBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MstBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstBarang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
