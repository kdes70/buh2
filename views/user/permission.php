<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Назначение ролей пользователю: ' . ' ' . $user_model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Назначение ролей пользователю: ' . $user_model->username];


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

                    'permission' => function ($url, $model, $key) use ($user_model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"/>', ['permission', 'id' => $user_model->id, 'role' => $model->name, 'action' => 1], ['title' => 'Дать роль']);
                    },
                            'update' => function ($url, $model, $key) use ($user_model) {
                        return Html::a('<span class="glyphicon glyphicon-minus"/>', ['permission', 'id' => $user_model->id, 'role' => $model->name, 'action' => 0], ['title' => 'Отобрать роль']);
                    },
                        ],
                        'template' => '{permission} {update}'
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>








</div>