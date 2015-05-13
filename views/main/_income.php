<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
?>

<div class="income-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryinc_id')->textInput() ?>

    <?= $form->field($model, 'date_oper')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php Pjax::begin(['timeout' => 3000]); ?>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => '{items}{summary}{pager}',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // 'id',
        'amount',
        'categoryinc_id',
        'date_oper',
        // 'user_id',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>

<?php Pjax::end(); ?>




