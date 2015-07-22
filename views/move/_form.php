<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Move */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="move-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wallet_from')->textInput() ?>

    <?= $form->field($model, 'wallet_to')->textInput() ?>

    <?= $form->field($model, 'move_sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_oper')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
