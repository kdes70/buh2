<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%move}}".
 *
 * @property integer $id
 * @property integer $wallet_from
 * @property integer $wallet_to
 * @property string $move_sum
 * @property string $date_oper
 * @property integer $user_id
 * @property string $description
 */
class Move extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%move}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['wallet_from', 'wallet_to', 'move_sum', 'date_oper', 'user_id'], 'required'],
            [['wallet_from', 'wallet_to', 'user_id'], 'integer'],
            [['move_sum'], 'number'],
            // [['wallet_from',], 'compare', 'targetAttribute' => ['wallet_to'],  'message' => 'Ytkmpz !'],
            [['move_sum'], 'checkSumInWallet'],
            [['wallet_to'], 'checkFromTo'],
            [['date_oper'], 'safe'],
            //[['wallet_to'], 'unique'],
            [['description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'wallet_from' => 'Из кошелька (счета)',
            'wallet_to' => 'В кошелек (счет)',
            'move_sum' => 'Перемещаемая сумма',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletTo() {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_to']);
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
    public function getWalletFrom() {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_from']);
    }

    /**
     * Обновляем суммы в кошельках...
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $wallet_from = Wallet::findOne($this->wallet_from);
            $wallet_from->current_sum = $wallet_from->current_sum - $this->move_sum;
            $wallet_from->update();

            $wallet_to = Wallet::findOne($this->wallet_to);
            $wallet_to->current_sum = $wallet_to->current_sum + $this->move_sum;
            $wallet_to->update();
        }

        return parent::beforeSave($insert);
    }

    /**
     *  "Откат", при удалении Перемещения
     */
    public function beforeDelete() {
        if (parent::beforeDelete()) {


            $wallet_from = Wallet::findOne($this->wallet_from);
            $wallet_from->current_sum = $wallet_from->current_sum + $this->move_sum;
            $wallet_from->update();

            $wallet_to = Wallet::findOne($this->wallet_to);
            $wallet_to->current_sum = $wallet_to->current_sum - $this->move_sum;
            $wallet_to->update();


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
        if ($this->isNewRecord) {
            $wallet = Wallet::findOne($this->wallet_from);
            if ($wallet->current_sum < $this->move_sum) {
                $this->addError($attribute, 'В кошельке (на счете), не достаточно средств для совершения операции');
            }
        }
    }

    /**
     * Проверка передаяи средств из кошелька в себя же
     */
    public function checkFromTo($attribute, $params) {

        if ($this->wallet_from == $this->wallet_to) {

            $this->addError($attribute, 'Выберите другой кошелек (счет) !');
        }
    }

}
