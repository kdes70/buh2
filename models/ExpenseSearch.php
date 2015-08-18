<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Expense;

/**
 * ExpenseSearch represents the model behind the search form about `app\models\Expense`.
 */
class ExpenseSearch extends Expense {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'categoryexp_id', 'wallet_id', 'unit_id'], 'integer'],
            [['cost', 'count_unit'], 'number'],
            [['description', 'date_oper', 'user_id', 'unit_id', 'count_unit'], 'safe'],
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
        $query = Expense::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['date_oper' => SORT_DESC, 'id' => SORT_DESC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        //Для связанного поиска
        $query->joinWith('user');

        $query->andFilterWhere([
            'id' => $this->id,
            'cost' => $this->cost,
            'categoryexp_id' => $this->categoryexp_id,
            'date_oper' => $this->date_oper,
            //'user_id' => $this->user_id,
            'wallet_id' => $this->wallet_id,
            'unit_id' => $this->unit_id,
            'count_unit' => $this->count_unit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
                //Для связанного поиска
                ->andFilterWhere(['like', '{{%user}}.username', $this->user_id]);

        return $dataProvider;
    }

}
