<?php

namespace app\models;

use Yii;
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
            [['id', 'unit_id', 'categoryexp_id', 'user_id', 'wallet_id'], 'integer'],
            [['cost', 'amount'], 'number'],
            [['name', 'description', 'date_oper'], 'safe'],
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
            'sort' => ['defaultOrder' => ['date_oper' => SORT_DESC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cost' => $this->cost,
            'amount' => $this->amount,
            'unit_id' => $this->unit_id,
            'categoryexp_id' => $this->categoryexp_id,
            'date_oper' => $this->date_oper,
            'user_id' => $this->user_id,
            'wallet_id' => $this->wallet_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }

}
