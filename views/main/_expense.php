<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>

<?php Pjax::begin(['timeout' => 3000]); ?>


<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
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



        <?php

        echo Html::beginForm();
        echo DatePicker::widget([
            'name' => 'test',
            'attribute' => 'from_date',
        ]);

        echo Html::input('text', 'val');
        /* ------------------------------------------ */
        echo kartik\select2\Select2::widget([
            'name' => 'test',
            'language' => 'ru',
            'data' => ArrayHelper::map(app\models\Categoryexp::getAllForSelect(), 'id', 'name'),
            'options' => ['placeholder' => 'Выберите...'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]);
        echo Html::endForm();
        