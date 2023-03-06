<?php
namespace backend\models;

use common\models\Model;

/**
 * @property string $key
 * @property string $value
*/
class SpesifikasiForm extends Model
{
    public $key;
    public $value;

    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key', 'value'], 'string']
        ];
    }
}