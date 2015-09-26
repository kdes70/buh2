<?php

namespace app\models;

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses() {
        return $this->hasMany(Expense::className(), ['unit_id' => 'id']);
    }

    public function beforeDelete() {

        //Запрет удаления связей
        if (Expense::findOne(['unit_id' => $this->id])) {
            return FALSE;
        } else {
            return TRUE;
        }

        /*    public function beforeDelete() {
          $test = Expense::model()->countByAttributes(array('category_id' => $this->id));
          $test1 = self::model()->countByAttributes(array('parent_id' => $this->id));
          if (($test > 0) or ( $test1 > 0)) {
          echo 1;
          return FALSE;
          }
          echo 0;
          return TRUE;
          } */
        //Запрет удаления связей (конец)  
    }

}
