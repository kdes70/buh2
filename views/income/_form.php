<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $model app\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>


<?php if (Yii::$app->session->getFlash('created')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => 'Доходы',
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('created')
    ]);
    ?>
<?php endif; ?>

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
    <?=
    $form->field($model, 'wallet_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE, 'user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
        'language' => 'ru',
        'disabled' => $model->isNewRecord ? false : true,
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true, 'disabled' => $model->isNewRecord ? false : true,]) ?>
    <?=
    $form->field($model, 'categoryinc_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Categoryinc::find()->where(['user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>

    <?= $model->isNewRecord ? $form->field($model, 'continue')->checkbox() : null ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
