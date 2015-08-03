<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Expensetemp;

/**
 * ExpensetempSearch represents the model behind the search form about `app\models\Expensetemp`.
 */
class ExpensetempSearch extends Expensetemp {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'categoryexp_id', 'wallet_id', 'unit_id'], 'integer'],
            [['cost', 'count_unit'], 'number'],
            [['description', 'name', 'user_id', 'unit_id', 'count_unit'], 'safe'],
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
        $query = Expensetemp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        //Для связанного поиска
        $query->joinWith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'cost' => $this->cost,
            'categoryexp_id' => $this->categoryexp_id,
            //'user_id' => $this->user_id,
            'wallet_id' => $this->wallet_id,
            
            'unit_id' => $this->unit_id,
            'count_unit' => $this->count_unit,
            
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'name', $this->name])
                //Для связанного поиска
                ->andFilterWhere(['like', '{{%user}}.username', $this->user_id]);


        return $dataProvider;
    }

}
