<?php

namespace app\models;

use app\models\Wallet;
use app\models\Categoryexp;

/**
 * This is the model class for table "db1_expense".
 *
 * @property integer $id
 * @property string $cost


 * @property integer $categoryexp_id
 * @property string $categoryexp_add
 * @property string $description
 * @property integer $continue

 * @property string $date_oper
 * @property integer $user_id
 * @property integer $operwallet_id
 */
class Expense extends \yii\db\ActiveRecord {

    public $categoryexp_add;
    public $continue = 0;

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
            [['cost', 'date_oper', 'user_id', 'wallet_id'], 'required'],
            [['cost'], 'number'],
            [['categoryexp_id', 'user_id', 'wallet_id'], 'integer'],
            [['cost'], 'checkSumInWallet'],
            [['categoryexp_id'], 'required', 'when' => function($model) {
            return $model->categoryexp_add == NULL;
        }, 'message' => 'Необходимо заполнить «Категория» или создать новую.'],
            [['categoryexp_add'], 'checkCategoryexp'],
            [['date_oper'], 'safe'],
            [['description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cost' => 'Сумма расхода',
            'categoryexp_id' => 'Категория',
            'categoryexp_add' => 'Новая категория',
            'description' => 'Описание',
            'date_oper' => 'Дата операции',
            'user_id' => 'Пользователь',
            'wallet_id' => 'Кошелек (счет)',
            'continue' => 'Продолжать ввод...'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallet() {
        return $this->hasOne(Wallet::className(), ['id' => 'wallet_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryexp() {
        return $this->hasOne(Categoryexp::className(), ['id' => 'categoryexp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Минусуем сумму расхода из кошелька
     */
    public function beforeSave($insert) {


        //Обработка создания новой категории
        if ($this->categoryexp_add) {

            //Добавляем новую категорию
            $categoryexp = new Categoryexp();
            $categoryexp->parent_id = $this->categoryexp_id ? $this->categoryexp_id : 0;
            $categoryexp->name = $this->categoryexp_add;
            $categoryexp->save();

            //Присваиваем расходу ID новой категории
            $this->categoryexp_id = $categoryexp->id;
        }
        //Обработка создания новой категории (конец)

        if ($this->isNewRecord) {

            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum - $this->cost;

            $wallet->update();
        }

        return parent::beforeSave($insert);
    }

    /**
     * Возврат денег "Откат", при удалении Расхода
     */
    public function beforeDelete() {
        if (parent::beforeDelete()) {
            $wallet = Wallet::findOne($this->wallet_id);
            $wallet->current_sum = $wallet->current_sum + $this->cost;
            $wallet->update();
            return true;
        } else {
            return false;
        }
    }

    //Валидаторы

    /**
     * Проверка достаточности суммы в кошельке, для операции
     */
    public function checkSumInWallet($attribute, $params) {

        $wallet = Wallet::findOne($this->wallet_id);

        if ($wallet->current_sum < $this->cost) {

            $this->addError($attribute, 'В кошельке (на счете), не достаточно средств для совершения операции');
        }
    }

    /**
     * Проверка категории расходов, при добавлении на уникальность
     */
    public function checkCategoryexp($attribute, $params) {

        if (Categoryexp::findOne(['name' => $this->categoryexp_add])) {

            if (trim($this->categoryexp_add) == '') {

                $this->addError($attribute, 'Необходимо заполнить «Новая категория».');
            }

            $this->addError($attribute, 'Нарушение уникальности категории расходов.');
        }
    }

}
