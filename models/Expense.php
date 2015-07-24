<?php

namespace app\models;

use Yii;
use app\models\Unit;
use app\models\Wallet;

/**
 * This is the model class for table "db1_expense".
 *
 * @property integer $id
 * @property string $cost

 * @property integer $unit_id
 * @property integer $categoryexp_id

 * @property string $date_oper
 * @property integer $user_id
 * @property integer $operwallet_id
 */
class Expense extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%expense}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cost', 'categoryexp_id', 'date_oper', 'user_id', 'wallet_id'], 'required'],
            [['cost'], 'number'],
            [['categoryexp_id', 'user_id', 'wallet_id'], 'integer'],
            [['cost'], 'checkSumInWallet'],
            [['date_oper'], 'safe'],
            [['description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cost' => 'Сумма расхода',
     
            'categoryexp_id' => 'Категория',
            'description' => 'Описание',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
            'wallet_id' => 'Кошелек (счет)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryexp() {
        return $this->hasOne(Categoryexp::className(), ['id' => 'categoryexp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Минусуем сумму расхода из кошелька
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {

            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum - $this->cost;

            $wallet->update();
        }

        return parent::beforeSave($insert);
    }

    
        /**
     * Возврат денег "Откат", при удалении Расхода
     */
    public function beforeDelete() {
        if (parent::beforeDelete()) {
            
            
            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum + $this->cost;

            $wallet->update();
            
            
            
            return true;
        } else {
            return false;
        }
    }

    //Валидаторы

    /**
     * Проверка достаточности суммы в кошельке, для операции
     */
    public function checkSumInWallet($attribute, $params) {

        $wallet = Wallet::findOne($this->wallet_id);
        $sum_in_wallet = $wallet->current_sum;

        if ($wallet->current_sum < $this->cost) {

            $this->addError($attribute, 'В кошельке (на счете), не достаточно средств для совершения операции');
        }
    }

}
