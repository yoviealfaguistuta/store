<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

/**
 * This is the model class for table "mst_barang".
 *
 * @property int $id
 * @property int $kategori_id
 * @property string $name
 * @property string $code
 * @property int $price
 * @property string|null $short_description Format JSON Array, contoh: ["43 Inch", "Full HD (1920 x 1080)", "USB"]
 * @property string|null $long_description Format HTML, Penjelasan promosi panjang
 * @property string|null $garansi contoh: 1 Year Local Official Distributor Warranty
 * @property string|null $include Format JSON Array, Yang didapatkan pembeli dalam paket, contoh: ["charger", "headset", "kartu garansi"]
 * @property string|null $exclude Format JSON Array, Yang tidak termasuk dalam paket, contoh: ["charger", "headset", "kartu garansi"]
 * @property string|null $spesifikasi Format JSON key=>value, contoh: {"Resolusi Layar":"1.920 x 1.080 Full HD", "Tipe Layar":"LED SMART TV"}
 * @property int $created_at
 * @property int $created_by
 * @property int $updated_at
 * @property int $updated_by
 *
 * @property MstJenisBarang $jenis
 * @property MstKategoriBarang $kategori
 * @property MstBarangImage[] $mstBarangImages
 * @property string $kategoriName
 * @property string $jenisName
 */
class MstBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mst_barang';
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
    public function fields()
    {
        return [
            'id',
            'kategori_id',
            'name',
            'code',
            'price',
            'short_description' => function($model){
                /* @var $model MstBarang*/
                return explode(',', $model->short_description);
            },
            'long_description',
            'garansi',
            'include' => function($model){
                /* @var $model MstBarang*/
                return explode(',', $model->include);
            },
            'exclude' => function($model){
                /* @var $model MstBarang*/
                return explode(',', $model->exclude);
            },
            'spesifikasi' => function($model){
                /* @var $model MstBarang*/
                return Json::decode($model->spesifikasi);
            },
            'images' => function($model){
                /* @var $model MstBarang*/
                $images = [];
                foreach ($model->mstBarangImages as $mstBarangImage) {
                    $images[]=[
                        'thumb'=>$mstBarangImage->imageThumbUrl,
                        'small'=>$mstBarangImage->imageSmallUrl,
                        'original'=>$mstBarangImage->imageOriginalUrl
                    ];
                }
                return $images;
            },
            'kategoriName',
            'jenisName'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_id', 'name', 'price'], 'required'],
            [['kategori_id', 'price', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['kategori_id', 'price', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['short_description', 'long_description', 'include', 'exclude', 'spesifikasi'], 'string'],
            [['name', 'garansi'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['code'], 'unique'],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => MstKategoriBarang::className(), 'targetAttribute' => ['kategori_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori_id' => 'Kategori ID',
            'name' => 'Name',
            'code' => 'Code',
            'price' => 'Price',
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'garansi' => 'Garansi',
            'include' => 'Include',
            'exclude' => 'Exclude',
            'spesifikasi' => 'Spesifikasi',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'kategoriName' => 'Kategori',
            'jenisName' => 'Jenis',
        ];
    }

    public function attributeHints()
    {
        return [
            'short_description' => 'Deskripsi singkat dipisahkan oleh koma. Contoh: 43 Inch,Full HD (1920 x 1080),USB Support,Anti Dust',
            'long_description' => 'Penjelasan promosi panjang',
            'garansi' => 'Contoh: 1 Year Local Official Distributor Warranty',
            'include' => 'Yang didapatkan pembeli dalam paket, dipisahkan oleh koma. Contoh: charger,headset,kartu garansi',
            'exclude' => 'Yang tidak termasuk dalam paket, dipisahkan oleh koma. Contoh: charger,headset',
            'spesifikasi' => 'Format JSON key=>value, contoh: {"Resolusi Layar":"1.920 x 1.080 Full HD","Tipe Layar":"LED SMART TV"}',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(MstKategoriBarang::className(), ['id' => 'kategori_id']);
    }

    /**
     * Gets query for [[Jenis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(MstJenisBarang::className(), ['id' => 'jenis_id'])->via('kategori');
    }

    /**
     * Gets query for [[MstBarangImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMstBarangImages()
    {
        return $this->hasMany(MstBarangImage::className(), ['barang_id' => 'id']);
    }

    /**
     * @return string
     */
    public function getKategoriName()
    {
        return $this->kategori->name;
    }

    /**
     * @return string
     */
    public function getJenisName()
    {
        return $this->jenis->name;
    }
}
