<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%unit}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $fullname
 */
class Unit extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%unit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'fullname'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 50],
            [['fullname'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'fullname' => 'Полное наименование',
        ];
    }

}
