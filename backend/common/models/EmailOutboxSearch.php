<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmailOutbox;

/**
 * EmailOutboxSearch represents the model behind the search form of `common\models\EmailOutbox`.
 */
class EmailOutboxSearch extends EmailOutbox
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'processed_at'], 'integer'],
            [['email', 'subject', 'content'], 'safe'],
            [['processed'], 'boolean'],
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
        $query = EmailOutbox::find();

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
            'processed' => $this->processed,
            'created_at' => $this->created_at,
            'processed_at' => $this->processed_at,
        ]);

        $query->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'subject', $this->subject])
            ->andFilterWhere(['ilike', 'content', $this->content])
        ;

        return $dataProvider;
    }
}
