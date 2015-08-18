<?php

namespace app\models;

/**
 * This is the model class for table "{{%categoryexp}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 *
 * @property Categoryexp $parent
 * @property Categoryexp[] $categoryexps
 */
class Categoryexp extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%categoryexp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id'], 'integer'],
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
            'parent_id' => 'Родительская категория',
            'name' => 'Наименование',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasOne(Categoryexp::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryexps() {
        return $this->hasMany(Categoryexp::className(), ['parent_id' => 'id']);
    }

    /**
     * Получить parent_id
     */
    public function getParentId() {

        $result = Categoryexp::find()
                ->where(['id' => $this->parent_id])
                ->one();
        if (isset($result->parent_id)) {
            return $result->parent_id;
        } else {
            return 0;
        }
    }

    //Мои методы*********************************************************

    public function getCountSubitems($id) {

        $result = Categoryexp::find()
                ->where(['parent_id' => $id])
                ->count();

        return $result;
    }

    /**
     * Get All categories data prepared for insert into $form->dropDownList (Возаращает иерархию категорий НОВЫЙ ВАРИАНТ)
     * 
     * @return array
     */
    public static function getAllForSelect($flag = 1) {
        if ($flag == 1) {
            $categoryData = Categoryexp::findBySql('SELECT * FROM  {{%categoryexp}} where id <> 0 order by name')->all();
        }
        if ($flag == 2) {
            $categoryData = Categoryexp::findBySql('SELECT * FROM  {{%categoryexp}}  order by name')->all();
        }
        $categoryDataTree = self::dbResultToForest($categoryData, 'id', 'parent_id', 'name');
        $categoryDataSelect = self::converTreeArrayToSelect($categoryDataTree, 0);

        //return ArrayHelper::map($categoryDataSelect, 'id', 'name');
        return $categoryDataSelect;
    }

    /**
     * Build heriarhal result from DB Query result.
     * db result must conist id, parent_id, value
     * 
     * @param Object $rows
     * @param string $idName name of id key in result query
     * @param string $parent_idName name of parent id for query result
     * @param string $labelName name of value field in query result
     * @return array heriarhical tree
     */
    public function dbResultToForest($rows, $idName, $parent_idName, $labelName = 'label') {
        $totalArray = array();
        $children = array(); // children of each ID
        $ids = array();
        $k = 0;
        // Collect who are children of whom.
        foreach ($rows as $i => $r) {
            $element = ['id' => $rows[$i][$idName], 'parent_id' => $rows[$i][$parent_idName], 'value' => $rows[$i][$labelName]];
            $totalArray[$k++] = $element;
            $row = &$totalArray[$k - 1];
            $id = $row['id'];
            if ($id === null) {
                // Rows without an ID are totally invalid and makes the result tree to
                // be empty (because PARENT_ID = null means "a root of the tree"). So
                // skip them totally.
                continue;
            }
            $parent_id = $row['parent_id'];
            if ($id == $parent_id) {
                $parent_id = null;
            }
            $children[$parent_id][$id] = & $row;
            if (!isset($children[$id])) {
                $children[$id] = array();
            }
            $row['childNodes'] = &$children[$id];
            $ids[$id] = true;
        }

        // Root elements are elements with non-found parent_ids.
        $forest = array();
        foreach ($totalArray as $i => $r) {
            $row = &$totalArray[$i];
            $id = $row['id'];
            $parent_id = $row['parent_id'];
            if ($parent_id == $id)
                $parent_id = null;
            if (!isset($ids[$parent_id])) {
                $forest[$row[$idName]] = & $row;
            }
        }
        return $forest;
    }

    /**
     * Recursive function converting tree like array to single array with
     * delimiter. Such type of array used for generate drop down box
     * 
     * @param array $data data of tree like
     * @param int $level current level of recursive function
     * @return array converted array
     */
    public function converTreeArrayToSelect($data, $level = 0) {
        foreach ($data as $item) {
            $subitems = array();
            $elementName = "" . str_repeat("--", $level * 2) . " " . $item['value'];
            $returnItem = array('name' => $elementName, 'id' => $item['id']);
            if ($item['childNodes']) {
                $subitems = Categoryexp::converTreeArrayToSelect($item['childNodes'], $level + 1);
            }

            $returnArray[] = $returnItem;

            if ($subitems != array()) {
                $returnArray = array_merge($returnArray, $subitems);
            }
        }
        return $returnArray;
    }

}
