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
            [['name', 'state', 'user_id'], 'required'],
            [['state', 'user_id'], 'integer'],
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
            'name' => 'Name',
            'state' => 'State',
            'user_id' => 'User ID',
        ];
    }
}
