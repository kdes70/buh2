<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expense-form">
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

    <?=
    $form->field($model, 'wallet_id')->widget(Select2::classname(), [
        //'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE, 'user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
        'data' => ArrayHelper::map(Wallet::getAllAndCurrentSum(Yii::$app->user->identity->id), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'append' => [
                'content' => Html::button('<span class="glyphicon glyphicon-refresh"></span>', ['class' => 'btn btn-default', 'id' => 'add-move', 'data-toggle' => "modal", 'data-target' => "#win1"]),
                'asButton' => true,
            ]
        ]
    ])
    ?>

    <?= $form->field($model, 'cost')->textInput(['maxlength' => 10]) ?>

    <?=
    $form->field($model, 'categoryexp_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Categoryexp::getAllForSelect(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'append' => [
                'content' => Html::button('<span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default', 'id' => 'add-categoryexp', 'data-toggle' => "modal", 'data-target' => "#win2"]),
                'asButton' => true
            ]
        ]
    ])
    ?>


    <?= $form->field($model, 'description')->textInput(['maxlength' => 200]) ?>        




    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= $model->isNewRecord ? Html::Button('Создать и продолжить...', ['class' => 'btn btn-success']) : null ?>
        <?= Html::Button('Сохоанить как шаблон', ['class' => 'btn btn-default',]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>



<?php
Modal::begin([
    'header' => '<h4>Перемещение средств</h4>',
    'id' => 'win1'
        //'toggleButton' => ['label' => 'click me'],
]);

echo 'Окно 1';

Modal::end();

Modal::begin([
    'header' => '<h4>Добавить категорию</h4>',
    'id' => 'win2'
        //'toggleButton' => ['label' => 'click me'],
]);

echo 'Окно 2';

Modal::end();
?>
