<?php
namespace api\controllers;

use common\models\MstJenisBarangSearch;
use Yii;

/**
*/
class JenisBarangController extends CorsController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     *  @OA\Get (
     *      tags={"Jenis Barang"},
     *      path="/jenis-barang",
     *      summary="List Jenis Barang",
     *      description="Menampilkan daftar jenis barang",
     *     @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan nama jenis barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="code",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan kode jenis barang",
     *      @OA\Schema(type="string"),
     *  ),
     *     @OA\Parameter(
     *      name="tag",
     *      in="query",
     *      required=false,
     *      description="Pencarian berdasarkan tag jenis barang",
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
     *              example={ "items": { { "id": 1, "name": "Digital Product", "code": "DP", "tag": "digital-product", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 }, { "id": 2, "name": "Office Supplies", "code": "OS", "tag": "office-supplies", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 }, { "id": 3, "name": "Gadget", "code": "GG", "tag": "gadget", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 }, { "id": 4, "name": "Elektronik", "code": "EL", "tag": "elektronik", "description": "", "created_at": 1608544840, "created_by": 1, "updated_at": 1608544840, "updated_by": 1 } } }
     *          )
     *      ),
     *      @OA\Response(response="404", description="Not Found")
     *  )
     */
    public function actionIndex(){
        $searchModel = new MstJenisBarangSearch();
        $dataProvider = $searchModel->search([$searchModel->formName()=>Yii::$app->request->queryParams]);
        $dataProvider->pagination = false;
        return $dataProvider;
    }
}