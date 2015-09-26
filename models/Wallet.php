<?php

namespace app\models;

use Yii;
use app\classes\Messages;

/**
 * This is the model class for table "{{%wallet}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $state
 * @property integer $user_id
 *
 * @property User $user
 */
class Wallet extends \yii\db\ActiveRecord {

    const STATE_ACTIVE = 0;
    const STATE_CLOSE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%wallet}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'state', 'user_id', 'current_sum'], 'required'],
            [['state', 'user_id'], 'integer'],
            [['current_sum'], 'number'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'current_sum' => 'Текущая сумма',
            'state' => 'Состояние',
            'user_id' => 'Пользователь',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getMovesTo() {
        return $this->hasMany(Move::className(), ['wallet_to' => 'id']);
    }

    public function getMovesFrom() {
        return $this->hasMany(Move::className(), ['wallet_from' => 'id']);
    }

    public function getCategoryincs() {
        return $this->hasMany(Categoryinc::className(), ['wallet_default' => 'id']);
    }

    public function getExpenses() {
        return $this->hasMany(Expense::className(), ['wallet_id' => 'id']);
    }

    public function getExpensetemps() {
        return $this->hasMany(Expensetemp::className(), ['wallet_id' => 'id']);
    }

    public function getIncomes() {
        return $this->hasMany(Income::className(), ['wallet_id' => 'id']);
    }

    //Мои статические методы для списков

    /**
     * Возвращает список Пользователей и их Кошельков
     */
    public static function getAllAndUserName() {

        $sql = 'SELECT
            wa.id as id, concat(wa.name, " (", us.username, ")") as name
            FROM db1_wallet wa, db1_user us
            where wa.user_id = us.id
            and wa.state = 0
            order by us.username, wa.name';

        return self::findBySql($sql)->all();
    }

    /**
     * Возвращает  Кошельков пользователя и суммы в них
     */
    public static function getAllAndCurrentSum($user_id) {

        $sql = 'SELECT wa.id AS id, CONCAT( wa.name,  " - ", wa.current_sum ) AS name
                FROM db1_wallet wa, db1_user us
                WHERE wa.user_id = us.id
                AND wa.state =0
                AND us.id = ' . $user_id
                . ' ORDER BY us.username, wa.name';

        return self::findBySql($sql)->all();
    }

    public function beforeDelete() {
        //Запрет удаления связей
        if (Move::findOne(['wallet_to' => $this->id]) ||
                Move::findOne(['wallet_from' => $this->id]) ||
                Categoryinc::findOne(['wallet_default' => $this->id]) ||
                Expense::findOne(['wallet_id' => $this->id]) ||
                Expensetemp::findOne(['wallet_id' => $this->id]) ||
                Income::findOne(['wallet_id' => $this->id])
        ) {
            Yii::$app->getSession()->setFlash('delete-error', Messages::DELETE_ERROR_RELATION);
            return FALSE;
        }
        Yii::$app->getSession()->setFlash('delete-success', Messages::DELETE_SUCCESS);
        return TRUE;
    }

}
