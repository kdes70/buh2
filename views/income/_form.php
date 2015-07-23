<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;

/* @var $this yii\web\View */
/* @var $model app\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-form">
    <?php $form = ActiveForm::begin(); ?>
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
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'categoryinc_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Categoryinc::find()->all(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?=
    $form->field($model, 'wallet_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE])->all(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::Button('Сохоанить, как шаблон', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
