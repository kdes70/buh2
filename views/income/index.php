<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IncomeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доходы';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>
<div class="income-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(['timeout' => 3000]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'amount',
            'categoryinc_id',
            'date_oper',
            'user_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
