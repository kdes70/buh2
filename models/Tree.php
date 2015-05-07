<?php

namespace app\models;

use Yii;
use creocoder\nestedsets\NestedSetsBehavior;
use app\components\TreeQuery;

/**
 * This is the model class for table "{{%tree}}".
 *
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 */
class Tree extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%tree}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['lft', 'rgt', 'depth'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'lft' => 'Левый ключ',
            'rgt' => 'Правый ключ',
            'depth' => 'Уровень',
            'name' => 'Наименование',
        ];
    }

    //Работа с деревом
    public function behaviors() {
        return [
            NestedSetsBehavior::className(),
        ];
    }

    public function transactions() {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find() {
        return new TreeQuery(get_called_class());
    }

    //Работа с деревом(конец)
}
