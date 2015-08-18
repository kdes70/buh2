<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
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




<?php Pjax::begin(['timeout' => 3000]); ?>


<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => '{items}{summary}{pager}',
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //   'id',
        'date_oper',
        'cost',
        //'amount',
//        [
//            'attribute' => 'unit_id',
//            'value' => 'unit.name'
//        ],
        [
            'attribute' => 'categoryexp_id',
            'value' => 'categoryexp.name'
        ],
        // 'name',
        // 'date_oper',
        // 'user_id',
        // 'operwallet_id',
        ['class' => \yii\grid\ActionColumn::className(),
            'header' => 'Действия',
            'options' => ['width' => '70px'],
            'buttons' => [
                'undo' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-backward"/>', ['undo', 'id' => $key], ['title' => 'Откатить']);
                },
                        'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['update', 'id' => $key], ['title' => 'Изменить', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?']);
                },
                    ],
                    'template' => '{update}  {undo}'
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>




