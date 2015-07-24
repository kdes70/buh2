<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Wallet;

/* @var $this yii\web\View */
/* @var $model app\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_sum')->textInput() ?>

    <?= $form->field($model, 'state')->dropDownList(['' => 'Выберите...', Wallet::STATE_ACTIVE => 'Активен', Wallet::STATE_CLOSE => 'Закрыт']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
