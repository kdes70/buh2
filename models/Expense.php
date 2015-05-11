<?php

namespace app\models;

use Yii;
use app\models\Unit;

/**
 * This is the model class for table "db1_expense".
 *
 * @property integer $id
 * @property string $cost
 * @property string $amount
 * @property integer $unit_id
 * @property integer $categoryexp_id
 * @property string $name
 * @property string $date_oper
 * @property integer $user_id
 * @property integer $operwallet_id
 */
class Expense extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%expense}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['cost', 'amount', 'unit_id', 'categoryexp_id', 'name', 'date_oper', 'user_id', 'operwallet_id'], 'required'],
            [['cost', 'amount'], 'number'],
            [['unit_id', 'categoryexp_id', 'user_id', 'operwallet_id'], 'integer'],
            [['date_oper'], 'safe'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cost' => 'Цена',
            'amount' => 'Количество',
            'unit_id' => 'Единица измерения',
            'categoryexp_id' => 'Категория расходов',
            'name' => 'Наименование',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
            'operwallet_id' => 'Операции с кошельками',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }
    
    
        /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryexp()
    {
        return $this->hasOne(Categoryexp::className(), ['id' => 'categoryexp_id']);
    }
    

}
