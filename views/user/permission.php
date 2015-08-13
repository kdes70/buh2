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
        'layout' => '{items}{pager}',
        'rowOptions' => function ($model) use ($user_model) {

            $dbman = new yii\rbac\DbManager;
            if (!$dbman->checkAccess($user_model->id, $model->name)) {
                return ['class' => 'danger'];
            } else if ($dbman->checkAccess($user_model->id, $model->name)) {
                return ['class' => 'success'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Роль',
                        'value' => function ($data) {

                            return $data->description;
                        }
                    ],
                    [
                        'header' => 'Назначена',
                        'value' => function($data) use ($user_model) {
                            $dbman = new yii\rbac\DbManager;
                            if ($dbman->checkAccess($user_model->id, $data->name)) {
                                return 'ДА';
                            } else {
                                return 'НЕТ';
                            }
                        },
                    ],
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