<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db1_categoryinc".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $user_id
 * @property string $name
 * @property integer $wallet_default
 */
class Categoryinc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db1_categoryinc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id', 'wallet_default'], 'integer'],
            [['name', 'wallet_default'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['name', 'user_id'], 'unique', 'targetAttribute' => ['name', 'user_id'], 'message' => 'The combination of User ID and Name has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'wallet_default' => 'Wallet Default',
        ];
    }
}
