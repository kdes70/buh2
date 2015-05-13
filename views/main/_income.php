<?php

use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<div> <p>Форма...</p>
    <?php
    echo Html::beginForm();
    echo DatePicker::widget([
        'name' => 'test',
        'attribute' => 'from_date',
    ]);

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
    ?>
    <p>Форма(конец)...</p>
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




