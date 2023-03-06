<?php
namespace api\controllers;

use common\models\MstKategoriBarangSearch;
use Yii;

/**
*/
class KategoriBarangController extends CorsController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     *  @OA\Get (
     *      tags={"Kategori Barang"},
     *      path="/kategori-barang/{jenisId}",
     *      summary="List Jenis Barang",
     *      description="Menampilkan daftar jenis barang",
     *     @OA\Parameter(
     *      name="jenisId",
     *      in="path",
     *      required=true,
     *      description="ID jenis barang",
     *      @OA\Schema(type="integer"),
     *  ),
     *     @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan nama kategori barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="code",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan kode kategori barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="tag",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan tag kategori barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="sort",
     *      in="query",
     *      required=false,
     *      description="Mengurutkan berdasarkan attribut yang diinginkan, contoh: name (untuk urut berdasarkan nama ASCENDING), -name (untuk urut berdasarkan nama DESCENDING)",
     *      @OA\Schema(type="string"),
     *  ),
     *      @OA\Response(
     *          response="200",
     *          description="ok",
     *          @OA\JsonContent(
     *              example={ "items": { { "id": 3, "jenis_id": 2, "name": "Printer", "code": "PRNT", "tag": "printer", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 }, { "id": 4, "jenis_id": 2, "name": "Scanner", "code": "SCNR", "tag": "scanner", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 } } }
     *          )
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     */
    public function actionIndex($jenisId){
        $searchModel = new MstKategoriBarangSearch(['jenis_id'=>$jenisId]);
        $dataProvider = $searchModel->search([$searchModel->formName()=>Yii::$app->request->queryParams]);
        $dataProvider->pagination = false;
        return $dataProvider;
    }
}