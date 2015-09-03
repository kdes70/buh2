<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\User;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>



<?php if (Yii::$app->session->getFlash('delete-user-error')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => 'Пользователи',
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('delete-user-error')
    ]);
    ?>
<?php endif; ?>



<div class="user-index">


    <?php Pjax::begin(['timeout' => 3000]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'rowOptions' => function ($model) {
            if ($model->id == Yii::$app->user->id) {
                return ['class' => 'info'];
            } else if ($model->status == User::STATE_CLOSE) {
                return ['class' => 'danger'];
            } else if ($model->status == User::STATE_ACTIVE) {
                return ['class' => 'success'];
            };
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'yii\grid\CheckboxColumn'],
                    //'id',
                    //'created_at',
                    //'updated_at',
                    'username',
                    'fullname',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return $data->status == User::STATE_ACTIVE ? "Активен" : ($data->status == User::STATE_CLOSE ? "Закрыт" : "---");
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', [User::STATE_ACTIVE => 'Активен', User::STATE_CLOSE => 'Закрыт'], ['class' => 'form-control', 'prompt' => '']),
                    ],
                    ['class' => \yii\grid\ActionColumn::className(),
                        'header' => 'Действия',
                        'options' => ['width' => '90px'],
                        'contentOptions' => ['style' => 'text-align: center'],
                        'buttons' => [

                            'password' => function ($url, $model, $key) {
                                return Html::a('<img src=' . Yii::$app->request->baseUrl . '/images/password.png >', ['password', 'id' => $key], ['title' => 'Изменить пароль']);
                            },
                                    'permission' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-user"/>', ['permission', 'id' => $key], ['title' => 'Назначить роли', 'data-pjax' => 0]);
                            },
                                    'update' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['update', 'id' => $key], ['title' => 'Изменить']);
                            },
                                    'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-trash"/>', ['delete', 'id' => $key], ['title' => 'Удалить', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?']);
                            },
                                ],
                                'template' => '{password} {permission} {update} {delete}'
                            ],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>

</div>