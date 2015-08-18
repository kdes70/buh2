<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Move;

/**
 * MoveSearch represents the model behind the search form about `app\models\Move`.
 */
class MoveSearch extends Move {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'wallet_from', 'wallet_to',], 'integer'],
            [['move_sum'], 'number'],
            [['date_oper', 'description', 'user_id'], 'safe'],
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
        $query = Move::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['date_oper' => SORT_DESC, 'id' => SORT_DESC]]
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
            'wallet_from' => $this->wallet_from,
            'wallet_to' => $this->wallet_to,
            'move_sum' => $this->move_sum,
            'date_oper' => $this->date_oper,
                //'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
                //Для связанного поиска
                ->andFilterWhere(['like', '{{%user}}.username', $this->user_id]);

        return $dataProvider;
    }

}
