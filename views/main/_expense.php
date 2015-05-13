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
            'cost',
            'amount',
            [
                'attribute' => 'unit_id',
                'value' => 'unit.name'
            ],
            [
                'attribute' => 'categoryexp_id',
                'value' => 'categoryexp.name'
            ],
            // 'name',
            // 'date_oper',
            // 'user_id',
            // 'operwallet_id',
            ['class' => 'yii\grid\ActionColumn'],
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
/*------------------------------------------*/
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
