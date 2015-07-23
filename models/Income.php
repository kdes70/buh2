<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%income}}".
 *
 * @property integer $id
 * @property string $amount
 * @property integer $categoryinc_id
 * @property string $date_oper
 * @property integer $user_id
 *
 * @property User $user
 * @property Categoryinc $categoryinc
 */
class Income extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%income}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['amount', 'categoryinc_id', 'date_oper', 'user_id', 'wallet_id'], 'required'],
            [['amount'], 'number'],
            [['categoryinc_id', 'user_id', 'wallet_id'], 'integer'],
            [['date_oper'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'amount' => 'Сумма дохода',
            'categoryinc_id' => 'Категория',
            'wallet_id' => 'Кошелек (счет)',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryinc() {
        return $this->hasOne(Categoryinc::className(), ['id' => 'categoryinc_id']);
    }

}
