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




