<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expense-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'cost')->textInput(['maxlength' => 10]) ?>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => 10]) ?>
    <?=
    $form->field($model, 'unit_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Unit::find()->all(), 'id', 'fullname'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>
    <?=
    $form->field($model, 'categoryexp_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Categoryexp::getAllForSelect(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
    <?=
    $form->field($model, 'date_oper')->widget(
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
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'operwallet_id')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
