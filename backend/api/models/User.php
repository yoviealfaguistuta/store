<?php
namespace api\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property string $full_name
 * @property int $phone
 */
class User extends \common\models\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $labels = [
            'full_name' => 'Full Name',
            'phone' => 'Phone',
        ];

        return ArrayHelper::merge(parent::attributeLabels(), $labels);
    }

    /**
     * Finds user by username
     *
     * @param string $email
     * @return User|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }
}
