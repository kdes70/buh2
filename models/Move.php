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
 *
 * @property Wallet $walletTo
 * @property User $user
 * @property Wallet $walletFrom
 */
class Move extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%move}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wallet_from', 'wallet_to', 'move_sum', 'date_oper', 'user_id'], 'required'],
            [['wallet_from', 'wallet_to', 'user_id'], 'integer'],
            [['move_sum'], 'number'],
            [['date_oper'], 'safe'],
            [['wallet_to'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wallet_from' => 'Из кошелька',
            'wallet_to' => 'В кошелек',
            'move_sum' => 'Сумма перемещения',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletTo()
    {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletFrom()
    {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_from']);
    }
}
