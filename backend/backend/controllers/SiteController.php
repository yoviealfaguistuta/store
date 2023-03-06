<?php
namespace backend\controllers;

use OpenApi\Annotations\Contact;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\Server;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionDocs()
    {
        $dirScan = Yii::getAlias('@api');
        //BaseVarDumper::dump($dirScan, 10, true);Yii::$app->end();
        $openapi = \OpenApi\scan($dirScan);
        $openapi->info = new Info([
            'title'=>'Microdata Store API',
            'version'=>'1.0',
            'description'=>'Microdata Store Platform',
            'contact'=>new Contact(['email'=>'lifelinejar@gmail.com'])
        ]);
        $openapi->servers = [
            new Server([
                'url'=>Yii::$app->urlManagerApi->baseUrl,
                'description' => 'Main Server'
            ]),
        ];

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $openapi;
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionApiDoc()
    {
        $this->layout = 'swagger';
        return $this->render('api-doc');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
