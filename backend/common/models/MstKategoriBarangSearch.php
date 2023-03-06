<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MstKategoriBarang;

/**
 * MstKategoriBarangSearch represents the model behind the search form of `common\models\MstKategoriBarang`.
 */
class MstKategoriBarangSearch extends MstKategoriBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jenis_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'code', 'tag', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MstKategoriBarang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jenis_id' => $this->jenis_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'tag', $this->tag])
            ->andFilterWhere(['ilike', 'description', $this->description]);

        return $dataProvider;
    }
}
