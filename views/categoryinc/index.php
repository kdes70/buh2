<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryincSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории доходов';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>
<div class="categoryinc-index">
    <?php Pjax::begin(['timeout' => 3000,]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'parent_id',
            'user_id',
            'name',
            'wallet_default',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
