<?php

namespace app\models;

use Yii;
use creocoder\nestedsets\NestedSetsBehavior;
use app\components\TreeQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%catexp}}".
 *
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 */
class Catexp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%catexp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['lft', 'rgt', 'depth'], 'integer'],
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Глубина',
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

    /**
     * Возвращает массив для select2 по NESTED SETS
     */
    public static function getAllForSelect() {
        $arraySelect = self::findBySql('SELECT t.id, t.name, t.depth  FROM  {{%catexp}} t WHERE t.depth<>0 ORDER BY t.lft')->all();
        foreach ($arraySelect as $row) {
            $row['name'] = str_repeat(' ---', $row['depth'] - 1) . $row['name'];
            $arrayData[] = $row;
        }
        return ArrayHelper::map($arrayData, 'id', 'name');
    }

    //Сортировка
    /*
    public function orderByName() {
        $parent = Category::model()->findByPk(1);
        $descendants = $parent->children()->findAll(array("order" => "name DESC"));
        self::childrenOrderByName($descendants, $parent);
    }

    private function childrenOrderByName($descendants, $parent) {
        foreach ($descendants as $key => $category) {
            $category->moveAsFirst($parent);
            $_parent = Category::model()->findByPk($category->id);
            $_descendants = $_parent->children()->findAll(array("order" => "name DESC"));

            if (count($_descendants) > 0) {
                self::childrenOrderByName($_descendants, $_parent);
            }
        }
    }
      
     */
    //Сортировка(конец)

    //Работа с деревом(конец)
}
