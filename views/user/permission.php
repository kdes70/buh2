<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Назначение ролей пользователю: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Назначение ролей пользователю: ' . $model->username];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/user']],
];
?>

<div class="user-permission">





    <?php Pjax::begin(['timeout' => 3000]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',

            'description:ntext',

            ['class' => \yii\grid\ActionColumn::className(),
                'header' => 'Действия',
                'options' => ['width' => '90px'],
                'buttons' => [

                    'permission' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-plus"/>', ['permission', 'id' => $key], ['title' => 'Дать роль']);
                    },
                            'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-minus"/>', ['permission', 'id' => $key], ['title' => 'Отобрать роль']);
                    },
                        ],
                        'template' => '{permission} {update}'
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>








</div>