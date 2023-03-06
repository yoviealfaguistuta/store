<?php
namespace api\models;

use common\models\EmailOutbox;
use common\models\Referral;
use kartik\password\StrengthValidator;
use Yii;
use yii\base\Model;
use yii\web\HttpException;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $captcha;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['referal_id', 'integer'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'This email address has already been taken.'],

            [['password', 'confirm_password'], 'required'],
            [['password', 'confirm_password'], StrengthValidator::className(), 'preset'=>StrengthValidator::MEDIUM],
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],

            ['captcha', 'captcha', 'captchaAction' => 'site/captcha', 'caseSensitive' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'captcha'=>'Captcha'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeHints()
    {
        return [
            'username' => 'Huruf dan atau angka tanpa spasi.',
            'password' => 'minimal 8 karakter serta setidaknya mengandung satu huruf kecil, satu huruf bersar, satu angka dan satu simbol.',
            'confirm_password' => 'Masukan ulang password.',
            'email' => 'Masukan alamat email yang valid dan pastikan alamat email tersebut aktif.'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User | bool whether the creating new account was successful and email was sent
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if(!($flag = $user->save())){
                $transaction->rollBack();
                throw new HttpException(500, 'Gagal, coba lagi. (1)');
            }

            //Kirim email registrasi
            $mailSent = Yii::$app->db->createCommand()->insert(EmailOutbox::tableName(), [
                'email' => $user->email,
                'subject' => 'Account registration at ' . Yii::$app->name,
                'content' => Yii::$app->controller->renderPartial('@api/views/mail/emailVerify-html', ['user' => $user]),
                'created_at' => time(),
            ])->execute();
            if(!($flag = $mailSent > 0)){
                $transaction->rollBack();
                throw new HttpException(500, 'Gagal, coba lagi. (3)');
            }

            if($flag){
                $transaction->commit();
                return $user;
            }
        }catch (\Throwable $t){
            $transaction->rollBack();
            throw $t;
        }

        return null;
    }
}
