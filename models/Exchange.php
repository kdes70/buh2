<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%exchange}}".
 *
 * @property integer $id
 * @property string $start_date
 * @property string $currency_code
 * @property integer $number_units
 * @property string $official_exchange
 */
class Exchange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%exchange}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'currency_code', 'number_units', 'official_exchange'], 'required'],
            [['start_date'], 'safe'],
            [['number_units'], 'integer'],
            [['official_exchange'], 'number'],
            [['currency_code'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Дата начала',
            'currency_code' => 'Код валюты',
            'number_units' => 'Количество единиц',
            'official_exchange' => 'Официальный курс',
        ];
    }
}
