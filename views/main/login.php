<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Вход в программу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h3><?= Html::encode($this->title) ?></h3>

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

    <?= $form->field($model, 'username')->textInput(['value' => 'timur']) ?>
    <?= $form->field($model, 'password')->passwordInput(['value' => '111']) ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/key.png">
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>