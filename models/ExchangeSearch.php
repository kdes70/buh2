<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Exchange;

/**
 * ExchangeSearch represents the model behind the search form about `app\models\Exchange`.
 */
class ExchangeSearch extends Exchange {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'number_units'], 'integer'],
            [['start_date', 'currency_code'], 'safe'],
            [['official_exchange'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Exchange::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['start_date' => SORT_DESC, 'id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'start_date' => $this->start_date,
            'number_units' => $this->number_units,
            'official_exchange' => $this->official_exchange,
        ]);

        $query->andFilterWhere(['like', 'currency_code', $this->currency_code]);

        return $dataProvider;
    }

}
