<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db1_expensetemp".
 *
 * @property integer $id
 * @property string $cost
 * @property integer $categoryexp_id
 * @property string $description
 * @property integer $user_id
 * @property integer $wallet_id
 *
 * @property Wallet $wallet
 * @property Categoryexp $categoryexp
 * @property User $user
 */
class Expensetemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db1_expensetemp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'categoryexp_id', 'user_id', 'wallet_id'], 'required'],
            [['cost'], 'number'],
            [['categoryexp_id', 'user_id', 'wallet_id'], 'integer'],
            [['description'], 'string', 'max' => 200],
            [['cost', 'categoryexp_id', 'description', 'user_id', 'wallet_id'], 'unique', 'targetAttribute' => ['cost', 'categoryexp_id', 'description', 'user_id', 'wallet_id'], 'message' => 'Шаблон такой операции уже существует.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cost' => 'Сумма расхода',
            'categoryexp_id' => 'Категория расходов',
            'description' => 'Описание',
            'user_id' => 'Пользователь',
            'wallet_id' => 'Кошелек (счет)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallet()
    {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryexp()
    {
        return $this->hasOne(Categoryexp::className(), ['id' => 'categoryexp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
