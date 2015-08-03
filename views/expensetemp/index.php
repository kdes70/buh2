<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpensetempSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Шаблоны расходов';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>
<div class="expensetemp-index">


    <?php Pjax::begin(['timeout' => 3000]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'cost',
                'value' => 'cost',
                'contentOptions' => ['style' => 'text-align: right; font-weight:bold; color: red'],
            ],
            [
                'attribute' => 'categoryexp_id',
                'value' => 'categoryexp.name'
            ],
            'description',
            [
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            // 'wallet_id',
            ['class' => \yii\grid\ActionColumn::className(),
                'header' => 'Действия',
                'options' => ['width' => '70px'],
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['update', 'id' => $key], ['title' => 'Изменить']);
                    },
                            'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"/>', ['delete', 'id' => $key], ['title' => 'Удалить', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?']);
                    },
                        ],
                        'template' => '{update}  {delete}'
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>
</div>