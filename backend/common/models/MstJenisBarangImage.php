<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mst_jenis_barang_image".
 *
 * @property int $id
 * @property string $image_type
 * @property resource $original
 * @property resource $small
 * @property resource $thumb
 *
 * @property MstJenisBarang $jenisBarang
 */
class MstJenisBarangImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_jenis_barang_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'image_type', 'original', 'small', 'thumb'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['original', 'small', 'thumb'], 'string'],
            [['image_type'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => MstJenisBarang::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_type' => 'Image Type',
            'original' => 'Original',
            'small' => 'Small',
            'thumb' => 'Thumb',
            'imageFile' => 'Image'
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBarang()
    {
        return $this->hasOne(MstJenisBarang::className(), ['id' => 'id']);
    }
}
