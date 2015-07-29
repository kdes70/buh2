<?php

namespace app\models;

use yii\base\NotSupportedException;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public $password;
    public $password_repeat;

    public static function tableName() {
        return '{{%user}}';
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    //Мои методы...

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            [['created_at', 'updated_at', 'username', 'password', 'password_repeat', 'email', 'status'], 'required'],
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [['id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['username', 'auth_key', 'email_confirm_token', 'password_hash', 'password_reset_token', 'email'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'created_at' => 'Создан',
            'updated_at' => 'Изменен',
            'username' => 'Логин',
            'status' => 'Статус',
            'password' => 'Пароль',
            'password_repeat' => 'Пароль еще раз'
        ];
    }

    /**
     * Хешируем пароль, перед сохранением Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($insert) {

                //Установка пароля в $this->password_hash
                $this->setPassword($this->password);
                //Установка пароля в $this->password_hash (конец)

                $this->generateAuthKey();
            }
            return true;
        }
        return false;
    }

}
