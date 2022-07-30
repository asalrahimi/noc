<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Service;

/**
 * ServiceSearch represents the model behind the search form of `app\models\Service`.
 */
class ServiceSearch extends Service
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'max_use_no'], 'integer'],
            [['name','popOrPoint'], 'safe'],
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
        $query = Service::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'max_use_no' => $this->max_use_no,

        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        if(($this->popOrPoint !== null)&&($this->popOrPoint !== '')){
            $query2=$query;
        $query2->select('service_id')
        ->join('INNER JOIN','service_pop','service_pop.service_id=service.id')
        ->join('INNER JOIN','pop','service_pop.pop_id=pop.id')
        ->where(['like', 'pop.name', $this->popOrPoint])
        ->all();
        $query->andFilterWhere(['id'=>$query2]);
        }

        return $dataProvider;
    }
}
