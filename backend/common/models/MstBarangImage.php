<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mst_barang_image".
 *
 * @property int $id
 * @property int $barang_id
 * @property string $title
 * @property string $image_type
 * @property resource $original
 * @property resource $small
 * @property resource $thumb
 * @property bool $is_main
 *
 * @property MstBarang $barang
 *
 * @property string $imageThumbUrl
 * @property string $imageSmallUrl
 * @property string $imageOriginalUrl
 *
 * @property UploadedFile $imageFile
 */
class MstBarangImage extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_barang_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['barang_id'], 'default', 'value' => null],
            [['barang_id'], 'integer'],
            [['original', 'small', 'thumb'], 'safe'],
            [['is_main'], 'boolean'],
            [['title', 'image_type'], 'string', 'max' => 255],
            [['barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => MstBarang::className(), 'targetAttribute' => ['barang_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, bmp', 'on'=>'create'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, bmp', 'on'=>'update'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barang_id' => 'Barang ID',
            'title' => 'Title',
            'image_type' => 'Image Type',
            'original' => 'Original',
            'small' => 'Small',
            'thumb' => 'Thumb',
            'is_main' => 'Is Main',
            'imageFile' => 'Image'
        ];
    }

    /**
     * Gets query for [[Barang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(MstBarang::className(), ['id' => 'barang_id']);
    }

    /**
     * @return string
     */
    public function getImageThumbUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-barang/thumb/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageSmallUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-barang/small/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageOriginalUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-barang/original/'.$this->id]);
    }
}
