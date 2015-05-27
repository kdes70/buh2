<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Exchange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exchange-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'start_date')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => FALSE,
        'language' => 'ru',
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'currency_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_units')->textInput() ?>

    <?=
    $form->field($model, 'official_exchange', [
        'addon' => [
            'append' => [
                'content' => Html::button('Получить...', ['class' => 'btn btn-primary', 'id' => 'get-exchange']),
                'asButton' => true
            ]
        ]
    ])->textInput();

    //http://demos.krajee.com/widget-details/active-field#addon
    ?>


    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изиенить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
