<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserved;

/**
 * ReservedSearch represents the model behind the search form of `app\models\Reserved`.
 */
class ReservedSearch extends Reserved
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'pop_id'], 'integer','min' =>0],
            [['service_name','pop_name','pop_type','user_name','user_family','user_address','id'], 'safe',]

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
        $query = Reserved::find();

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
            'user_id' => $this->user_id,
            'service_id' => $this->service_id,
            'pop_id' => $this->pop_id,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
        ->andFilterWhere(['like', 'user_family', $this->user_family])
        ->andFilterWhere(['like', 'user_address', $this->user_address])
        ->andFilterWhere(['like', 'service_name', $this->service_name])
        ->andFilterWhere(['like', 'pop_name', $this->pop_name])
        ->andFilterWhere(['like', 'pop_type', $this->pop_type]);



        return $dataProvider;
    }
}
