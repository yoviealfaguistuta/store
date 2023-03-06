<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mst_jenis_barang".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $tag
 * @property string|null $description
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property MstKategoriBarang[] $mstKategoriBarangs
 * @property MstJenisBarangImage $mstJenisBarangImage
 *
 * @property string $imageThumbUrl
 * @property string $imageSmallUrl
 * @property string $imageOriginalUrl
 *
 * @property UploadedFile $imageFile
 */
class MstJenisBarang extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_jenis_barang';
    }

    public function fields()
    {
        $add = [
            'image_thumb'=>function($model){
                /* @var $model MstJenisBarang*/
                return $model->imageThumbUrl;
            },
            'image_small'=>function($model){
                /* @var $model MstJenisBarang*/
                return $model->imageSmallUrl;
            },
            'image_original'=>function($model){
                /* @var $model MstJenisBarang*/
                return $model->imageOriginalUrl;
            }
        ];
        return ArrayHelper::merge(parent::fields(), $add);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'tag'], 'required'],
            [['description'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'tag'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique'],
            [['tag'], 'unique'],
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
            'name' => 'Name',
            'code' => 'Code',
            'tag' => 'Tag',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'imageFile' => 'Image',
        ];
    }

    /**
     * Gets query for [[MstKategoriBarangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMstKategoriBarangs()
    {
        return $this->hasMany(MstKategoriBarang::className(), ['jenis_id' => 'id']);
    }

    /**
     * Gets query for [MstJenisBarangImage].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMstJenisBarangImage()
    {
        return $this->hasOne(MstJenisBarangImage::className(), ['id' => 'id']);
    }

    /**
     * @return array
     */
    public static function optionLists(){
        $models = self::find()->select(['id', 'name'])->orderBy('name')->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }

    /**
     * @return string
     */
    public function getImageThumbUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-jenis/thumb/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageSmallUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-jenis/small/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageOriginalUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-jenis/original/'.$this->id]);
    }
}
