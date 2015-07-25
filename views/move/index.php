<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modelsMoveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Перемещения';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>
<div class="move-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'date_oper',
            'wallet_from',
            'move_sum',
            'wallet_to',
            [
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            ['class' => \yii\grid\ActionColumn::className(),
                'header' => 'Действия',
                'options' => ['width' => '70px'],
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['update', 'id' => $key], ['title' => 'Изменить']);
                    },
                            'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-arrow-left"/>', ['delete', 'id' => $key], ['title' => 'Откатить операцию', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите откатить операцию?']);
                    },
                        ],
                        'template' => '{update}  {delete}'
                    ],
                ],
            ]);
            ?>

</div>
