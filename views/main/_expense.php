<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;




echo Html::beginForm();


echo DatePicker::widget([
    //'model' => $model,

    'name' => 'test',
    'attribute' => 'from_date',
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
]);

echo Html::input('text', 'val');



echo kartik\select2\Select2::widget([
    'name' => 'test',
    'pluginLoading' => FALSE,
    'data' => array_merge(['' => ''], app\models\Categoryexp::getAllForSelect()),
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);
echo Html::endForm();
