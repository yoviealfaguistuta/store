<?php
namespace api\controllers;

use common\models\MstBarang;
use common\models\MstBarangSearch;
use Yii;
use yii\web\NotFoundHttpException;

/**
*/
class BarangController extends CorsController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * Lists all MstBarang models.
     * @return mixed
     *
     * @OA\Get (
     *      tags={"Barang"},
     *      path="/barang",
     *      summary="List Barang",
     *      description="Menampilkan daftar barang",
     *     @OA\Parameter(
     *      name="kategori_id",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan kategori barang",
     *      @OA\Schema(type="integer"),
     *  ),
     *     @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan nama barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="code",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan kode barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="tag",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan tag barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="sort",
     *      in="query",
     *      required=false,
     *      description="Mengurutkan berdasarkan attribut yang diinginkan, contoh: name (untuk urut berdasarkan nama ASCENDING), -name (untuk urut berdasarkan nama DESCENDING)",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="page",
     *      in="query",
     *      required=false,
     *      description="Lompat ke halaman yang diinginkan",
     *      @OA\Schema(type="integer"),
     *  ),
     *     @OA\Parameter(
     *      name="per-page",
     *      in="query",
     *      required=false,
     *      description="Jumlah data per halaman yang diinginkan, maksimal 50",
     *      @OA\Schema(type="integer"),
     *  ),
     *      @OA\Response(
     *          response="200",
     *          description="ok",
     *          @OA\JsonContent(
     *              example={ "items": { { "id": 2, "kategori_id": 4, "name": "asdf afsafasfdsaf", "code": "q083Pz4izNx5fIzG", "price": 400000, "short_description": { "43 Inch", "Full HD (1920 x 1080)", "USB Support", "Anti Dust" }, "long_description": "<p>sdf sdfsfdfsfs sdfsdfsf</p>", "garansi": "1 Year Local Official Distributor Warranty", "include": { "charger", "headset", "kartu garansi" }, "exclude": { "charger", "headset" }, "spesifikasi": { "Resolusi Layar": "1.920 x 1.080 Full HD", "Tipe Layar": "LED SMART TV" }, "images": { { "thumb": "http://microdatastore.cooljarsoft.com/image-barang/thumb/8", "small": "http://microdatastore.cooljarsoft.com/image-barang/small/8", "original": "http://microdatastore.cooljarsoft.com/image-barang/original/8" }, { "thumb": "http://localhost/microdata/store/frontend/web/image-barang/thumb/9", "small": "http://localhost/microdata/store/frontend/web/image-barang/small/9", "original": "http://localhost/microdata/store/frontend/web/image-barang/original/9" } }, "kategoriName": "Scanner", "jenisName": "Office Supplies" } }, "_links": { "self": { "href": "http://localhost/microdata/store/api/web/barang?page=1" }, "first": { "href": "http://localhost/microdata/store/api/web/barang?page=1" }, "last": { "href": "http://localhost/microdata/store/api/web/barang?page=1" } }, "_meta": { "totalCount": 1, "pageCount": 1, "currentPage": 1, "perPage": 20 } }
     *          )
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     */
    public function actionIndex(){
        $searchModel = new MstBarangSearch();
        $dataProvider = $searchModel->search([$searchModel->formName()=>Yii::$app->request->queryParams]);
        return $dataProvider;
    }

    /**
     * Displays a single MstBarang model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @OA\Get (
     *      tags={"Detail Barang"},
     *      path="/barang/{id}",
     *      summary="Detail Barang",
     *      description="Menampilkan detail barang",
     *     @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      description="ID barang",
     *      @OA\Schema(type="integer"),
     *  ),
     *      @OA\Response(
     *          response="200",
     *          description="ok",
     *          @OA\JsonContent(
     *              example={ "id": 2, "kategori_id": 4, "name": "asdf afsafasfdsaf", "code": "q083Pz4izNx5fIzG", "price": 400000, "short_description": { "43 Inch", "Full HD (1920 x 1080)", "USB Support", "Anti Dust" }, "long_description": "<p>sdf sdfsfdfsfs sdfsdfsf</p>", "garansi": "1 Year Local Official Distributor Warranty", "include": { "charger", "headset", "kartu garansi" }, "exclude": { "charger", "headset" }, "spesifikasi": { "Resolusi Layar": "1.920 x 1.080 Full HD", "Tipe Layar": "LED SMART TV" }, "images": { { "thumb": "http://localhost/microdata/store/api/web/image-barang/thumb/8", "small": "http://localhost/microdata/store/api/web/image-barang/small/8", "original": "http://localhost/microdata/store/api/web/image-barang/original/8" }, { "thumb": "http://localhost/microdata/store/api/web/image-barang/thumb/9", "small": "http://localhost/microdata/store/api/web/image-barang/small/9", "original": "http://localhost/microdata/store/api/web/image-barang/original/9" } }, "kategoriName": "Scanner", "jenisName": "Office Supplies" }
     *          )
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    /**
     * Finds the MstBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MstBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MstBarang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}