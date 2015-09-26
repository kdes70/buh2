<?php

namespace app\models;

/**
 * This is the model class for table "{{%categoryinc}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $name
 * @property integer $wallet_default
 *
 * @property Income[] $incomes
 */
class Categoryinc extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%categoryinc}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'wallet_default'], 'integer'],
            [['name', 'wallet_default'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name', 'user_id'], 'unique', 'targetAttribute' => ['name', 'user_id'], 'message' => 'У текущего пользователя, такая категория дохода уже существует!']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'name' => 'Наименование',
            'wallet_default' => 'Кошелек по умолчанию',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes() {
        return $this->hasMany(Income::className(), ['categoryinc_id' => 'id']);
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
    public function getWallet() {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_default']);
    }
    
    

}
