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
            'date_oper',
            [
                'attribute' => 'wallet_id',
                'value' => 'wallet.name'
            ],
            [
                'attribute' => 'categoryexp_id',
                'value' => 'categoryexp.name'
            ],
            [
                'attribute' => 'cost',
                'value' => 'cost',
                'contentOptions' => ['style' => 'text-align: right'],
            ],
            // 'name',
            // 'date_oper',
            [
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            // 'operwallet_id',
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
            <?php Pjax::end(); ?>


</div>
