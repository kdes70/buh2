<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Вход в систему';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа:</p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-sm-3 col-md-3 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'checkboxTemplate' => "<div class=\"col-lg-offset-1 col-sm-3 col-md-3 col-lg-3\">{beginLabel}\n{input}\n{labelTitle}\n{endLabel}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
    ]);
    ?>

    <?= $form->field($model, 'username')->textInput(['value'=>'timur']) ?>
    <?= $form->field($model, 'password')->passwordInput(['value'=>'111111'])?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>