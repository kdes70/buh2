<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categoryexp;

/**
 * CategoryexpSearch represents the model behind the search form about `app\models\Categoryexp`.
 */
class CategoryexpSearch extends Categoryexp {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = Categoryexp::find()->where('id != 0');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => ['defaultOrder' => ['name' => SORT_ASC],]
                ]
        );




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    public function setParent($value) {
        $this->parent_id = $value;
    }

    public function getParent() {
        return $this->parent_id;
    }

}
