<?php

namespace app\models;

/**
 * This is the model class for table "{{%income}}".
 *
 * @property integer $id
 * @property string $amount
 * @property integer $categoryinc_id
 * @property string $date_oper
 * @property integer $user_id

 * @property integer $continue
 * @property User $user
 * @property Categoryinc $categoryinc
 */
class Income extends \yii\db\ActiveRecord {

    public $continue = 0;

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
            'continue' => 'Продолжать ввод...'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallet() {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_id']);
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

    /**
     * Добавляем сумму дохода в кошелек
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {

            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum + $this->amount;

            $wallet->update();
        }

        return parent::beforeSave($insert);
    }

    /**
     * Возврат снятие денег "Откат", при удалении Дохода
     */
    public function beforeDelete() {
        if (parent::beforeDelete()) {


            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum - $this->amount;

            $wallet->update();



            return true;
        } else {
            return false;
        }
    }

}
