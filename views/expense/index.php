<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расходы';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>



<div class="expense-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(['timeout' => 3000]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
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


</div>
