<?php
namespace api\controllers;

use frontend\models\ResendVerificationEmailForm;
use api\models\User;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use api\models\LoginForm;
use api\models\PasswordResetRequestForm;
use api\models\ResetPasswordForm;
use api\models\SignupForm;
use api\models\ContactForm;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class SiteController extends CorsController
{
    /**
     *  @OA\Get (
     *      tags={"Captcha"},
     *      path="/site/captcha",
     *      summary="Kode Captcha",
     *      description="Kode Captcha",
     *      @OA\Response(
     *          response="200",
     *          description="Gambar captcha dalam format png",
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     */

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'fixedVerifyCode' => 'test',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return ['success'];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionLogin()
    {
        $this->layout = 'blank';

        if (!Yii::$app->user->isGuest) {
            return Yii::$app->user;
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->user;
        }

        throw new ForbiddenHttpException('Not Allowed');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        $model->load(Yii::$app->request->post());
        $model->validate();
        return $model;
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return 'About';
    }

    /**
     * Signs user up.
     *
     * @OA\Post (
     *      tags={"Signup"},
     *      path="/site/signup",
     *      summary="Signup",
     *      description="Signup",
     *      @OA\RequestBody(
     *          description="Request Body",
     *          required=true,
     *          @OA\JsonContent(
     *              example={"username":""}
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Gambar captcha dalam format png",
     *          @OA\JsonContent(
     *              example={"status":"OK"}
     *          )
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     *
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionSignup()
    {
        $this->layout = 'blank';

        $model = new SignupForm();
        $model->load(Yii::$app->request->post());
        $user = $model->signup();
        if ($user !== null){
            return $user;
        }

        return $model;
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        $model->load(Yii::$app->request->post());
        if ($model->validate()) {
            $model->sendEmail();
            return true;
        }

        return $model;
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
