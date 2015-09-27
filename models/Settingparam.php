<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%settingparam}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Setting[] $settings
 */
class Settingparam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settingparam}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Setting::className(), ['settingparam_id' => 'id']);
    }
}
