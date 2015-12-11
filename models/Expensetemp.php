<?php

namespace app\models;

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
class Expensetemp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'db1_expensetemp';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cost', 'categoryexp_id', 'user_id', 'wallet_id', 'name', 'unit_id', 'count_unit'], 'required'],
            [['cost', 'count_unit'], 'number'],
            [['categoryexp_id', 'user_id', 'wallet_id', 'unit_id'], 'integer'],
            [['description'], 'string', 'max' => 200],
            [['name'], 'string', 'max' => 50],
            [['cost', 'categoryexp_id', 'description', 'user_id', 'wallet_id',], 'unique', 'targetAttribute' => ['cost', 'categoryexp_id', 'description', 'user_id', 'wallet_id',], 'message' => 'Шаблон такой операции уже существует.'],
            [['user_id', 'name'], 'unique', 'targetAttribute' => ['user_id', 'name'], 'message' => 'Имя такого шаблона существует.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cost' => 'Сумма расхода',
            'unit_id' => 'Единица измерения',
            'count_unit' => 'Количество',
            'categoryexp_id' => 'Категория расходов',
            'description' => 'Описание',
            'user_id' => 'Пользователь',
            'wallet_id' => 'Кошелек (счет)',
            'name' => 'Наименование',
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
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

  }
