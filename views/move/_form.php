<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;

/* @var $this yii\web\View */
/* @var $model app\models\Move */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="move-form">

    <?php $form = ActiveForm::begin(); ?>



    <?=
    $form->field($model, 'wallet_from')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE, 'user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>

    <?=
    $form->field($model, 'wallet_to')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE])->all(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])
    ?>

    <?= $form->field($model, 'move_sum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_oper')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
