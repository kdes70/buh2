<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
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
