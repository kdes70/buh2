<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExchangeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы валют';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>
<div class="exchange-index">


    <?php Pjax::begin(['timeout' => 3000,]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'start_date',
            [
                'attribute' => 'currency_code',
                'value' => 'currency_code',
                'filter' => Html::activeDropDownList($searchModel, 'currency_code', [ 'USD' => 'USD', 'EUR' => 'EUR', 'RUB' => 'RUB'], ['class' => 'form-control', 'prompt' => 'Выберите валюту...']),
            ],
            'number_units',
            'official_exchange',
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



            <?php
            ?>
</div>
