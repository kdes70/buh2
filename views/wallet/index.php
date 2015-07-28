<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Wallet;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WalletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кошельки (счета)';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create',]],
];
?>
<div class="wallet-index">


    <?php Pjax::begin(['timeout' => 3000]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'rowOptions' => function ($model) {
            if ($model->state == Wallet::STATE_CLOSE) {
                return ['class' => 'danger'];
            } else if ($model->state == Wallet::STATE_ACTIVE) {
                return ['class' => 'success'];
            }
        },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    'name',
                    [
                        'attribute' => 'current_sum',
                        'value' => 'current_sum',
                        'contentOptions' => ['style' => 'text-align: right'],
                    ],
                    [
                        'attribute' => 'state',
                        'value' => function ($data) {
                            return $data->state == 0 ? "Активен" : ($data->state == 1 ? "Закрыт" : "---");
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'state', [Wallet::STATE_ACTIVE => 'Активен', Wallet::STATE_CLOSE => 'Закрыт'], ['class' => 'form-control', 'prompt' => '']),
                    ],
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
