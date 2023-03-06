<?php

namespace backend\controllers;

use Yii;
use common\models\EmailOutbox;
use common\models\EmailOutboxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmailOutboxController implements the CRUD actions for EmailOutbox model.
 */
class EmailOutboxController extends Controller
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
     * Lists all EmailOutbox models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailOutboxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmailOutbox model.
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
     * Creates a new EmailOutbox model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmailOutbox(['created_at'=>time()]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EmailOutbox model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmailOutbox model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing EmailOutbox model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCron()
    {
        $rows = (new \yii\db\Query())
            ->from(EmailOutbox::tableName())
            ->where(['processed' => false])
            ->limit(20)
            ->all();

        foreach ($rows as $row) {
            $sent = Yii::$app
                ->mailer
                ->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
                ->setTo($row['email'])
                ->setSubject($row['subject'])
                ->setHtmlBody($row['content'])
                ->send();

            if($sent){
                Yii::$app->db->createCommand()
                    ->update(EmailOutbox::tableName(), ['processed' => true, 'processed_at'=>time()], 'id = '.$row['id'])
                    ->execute();
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmailOutbox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmailOutbox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmailOutbox::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
