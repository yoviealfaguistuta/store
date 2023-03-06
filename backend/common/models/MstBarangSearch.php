<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MstBarang;

/**
 * MstBarangSearch represents the model behind the search form of `common\models\MstBarang`.
 */
class MstBarangSearch extends MstBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kategori_id', 'price'], 'integer'],
            [['name', 'code', 'short_description', 'long_description', 'garansi', 'include', 'exclude', 'spesifikasi'], 'safe'],
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
        $query = MstBarang::find();

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
            'kategori_id' => $this->kategori_id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'short_description', $this->short_description])
            ->andFilterWhere(['ilike', 'long_description', $this->long_description])
            ->andFilterWhere(['ilike', 'garansi', $this->garansi])
            ->andFilterWhere(['ilike', 'include', $this->include])
            ->andFilterWhere(['ilike', 'exclude', $this->exclude])
            ->andFilterWhere(['ilike', 'spesifikasi', $this->spesifikasi]);

        return $dataProvider;
    }
}
