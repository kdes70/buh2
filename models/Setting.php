<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $settingparam_id
 * @property string $name
 * @property string $unit_code
 * @property string $setting_code
 *
 * @property Settingparam $settingparam
 * @property User $user
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'settingparam_id', 'name', 'unit_code', 'setting_code'], 'required'],
            [['user_id', 'settingparam_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['unit_code'], 'string', 'max' => 20],
            [['setting_code'], 'string', 'max' => 25],
            [['user_id', 'settingparam_id'], 'unique', 'targetAttribute' => ['user_id', 'settingparam_id'], 'message' => 'The combination of Пользователь and Settingparam ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'settingparam_id' => 'Settingparam ID',
            'name' => 'Наименование',
            'unit_code' => 'Код раздела',
            'setting_code' => 'Код настройки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettingparam()
    {
        return $this->hasOne(Settingparam::className(), ['id' => 'settingparam_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
