<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wallet}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $state
 * @property integer $user_id
 *
 * @property User $user
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wallet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state', 'user_id', 'current_sum'], 'required'],
            [['state', 'user_id'], 'integer'],
            [['current_sum'], 'number'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'current_sum'=>'Текущая сумма',
            'state' => 'Состояние (0-действуюший, 1-Закрытый)',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
