<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%income}}".
 *
 * @property integer $id
 * @property string $amount
 * @property integer $categoryinc_id
 * @property string $date_oper
 * @property integer $user_id
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%income}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'categoryinc_id', 'date_oper', 'user_id'], 'required'],
            [['amount'], 'number'],
            [['categoryinc_id', 'user_id'], 'integer'],
            [['date_oper'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'categoryinc_id' => 'Categoryinc ID',
            'date_oper' => 'Date Oper',
            'user_id' => 'User ID',
        ];
    }
}
