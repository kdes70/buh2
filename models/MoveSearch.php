<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Move;

/**
 * MoveSearch represents the model behind the search form about `app\models\Move`.
 */
class MoveSearch extends Move
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wallet_from', 'wallet_to', 'user_id'], 'integer'],
            [['move_sum'], 'number'],
            [['date_oper', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Move::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'wallet_from' => $this->wallet_from,
            'wallet_to' => $this->wallet_to,
            'move_sum' => $this->move_sum,
            'date_oper' => $this->date_oper,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
