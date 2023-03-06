<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email_outbox".
 *
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $content
 * @property bool $processed
 * @property int|null $created_at
 * @property int|null $processed_at
 */
class EmailOutbox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email_outbox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['processed'], 'boolean'],
            [['created_at', 'processed_at'], 'default', 'value' => null],
            [['created_at', 'processed_at'], 'integer'],
            [['email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'processed' => 'Processed',
            'created_at' => 'Created At',
            'processed_at' => 'Processed At',
        ];
    }
}
