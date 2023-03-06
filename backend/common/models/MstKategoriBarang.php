<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mst_kategori_barang".
 *
 * @property int $id
 * @property int $jenis_id
 * @property string $name
 * @property string $code
 * @property string $tag
 * @property string|null $description
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property MstBarang[] $mstBarangs
 * @property MstJenisBarang $jenis
 * @property MstJenisBarang $jenisName
 *
 * @property MstKategoriBarangImage $mstKategoriBarangImage
 *
 * @property string $imageThumbUrl
 * @property string $imageSmallUrl
 * @property string $imageOriginalUrl
 *
 * @property UploadedFile $imageFile
 */
class MstKategoriBarang extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_kategori_barang';
    }

    public function fields()
    {
        $add = [
            'image_thumb'=>function($model){
                /* @var $model MstKategoriBarang*/
                return $model->imageThumbUrl;
            },
            'image_small'=>function($model){
                /* @var $model MstKategoriBarang*/
                return $model->imageSmallUrl;
            },
            'image_original'=>function($model){
                /* @var $model MstKategoriBarang*/
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
            [['jenis_id', 'name', 'code', 'tag'], 'required'],
            [['jenis_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['jenis_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['description'], 'string'],
            [['name', 'tag'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique'],
            [['tag'], 'unique'],
            [['jenis_id'], 'exist', 'skipOnError' => true, 'targetClass' => MstJenisBarang::className(), 'targetAttribute' => ['jenis_id' => 'id']],
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
            'jenis_id' => 'Jenis ID',
            'name' => 'Name',
            'code' => 'Code',
            'tag' => 'Tag',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'jenisName' => 'Jenis',
            'imageFile' => 'Image',
        ];
    }

    /**
     * Gets query for [[MstBarangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMstBarangs()
    {
        return $this->hasMany(MstBarang::className(), ['kategori_id' => 'id']);
    }

    /**
     * Gets query for [[Jenis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(MstJenisBarang::className(), ['id' => 'jenis_id']);
    }

    /**
     * @return string
     */
    public function getJenisName()
    {
        return $this->jenis->name;
    }

    /**
     * Gets query for [MstKatigoriBarangImage].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMstKategoriBarangImage()
    {
        return $this->hasOne(MstKategoriBarangImage::className(), ['id' => 'id']);
    }

    /**
     * @return string
     */
    public function getImageThumbUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-kategori/thumb/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageSmallUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-kategori/small/'.$this->id]);
    }

    /**
     * @return string
     */
    public function getImageOriginalUrl()
    {
        return Yii::$app->urlManagerApi->createAbsoluteUrl(['/image-kategori/original/'.$this->id]);
    }

    /**
     * @return array
     */
    public static function optionLists(){
        $data = [];
        $jenises = MstJenisBarang::find()->all();
        foreach ($jenises as $jenis) {
            /* @var $jenis MstJenisBarang*/
            foreach ($jenis->mstKategoriBarangs as $mstKategoriBarang) {
                /* @var $mstKategoriBarang MstKategoriBarang*/
                $data[$jenis->name][$mstKategoriBarang->id] = $mstKategoriBarang->name;
            }
        }
        return $data;
    }
}
