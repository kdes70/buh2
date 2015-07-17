<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryexpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории расходов';
$this->params['breadcrumbs'][] = $this->title;


$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create', 'parent_id' => 0]],
];
?>
<div class="categoryexp-index">

    <?php Pjax::begin(['timeout' => 3000,]); ?>




    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => Html::a($searchModel->getAttributeLabel('parent_id'), ['/categoryexp', 'parent_id' => $searchModel->getParentId()]) . ' / ' . Html::a('Создать в текущей', ['create', 'parent_id' => $searchModel->parent_id], []),
                'format' => 'html',
                //'filter' => Html::a($searchModel->getAttributeLabel('parent_id'), ['create', 'parent_id' => $searchModel->parent_id]),
                'value' => function($data) {
            return Html::a($data->parent->name, ['/categoryexp', 'parent_id' => $data->parent->parent_id]);
        },
            ],
            [
                'label' => $searchModel->getAttributeLabel('name'),
                'attribute' => 'name',
                'enableSorting' => TRUE,
                'filter' => TRUE,
                'format' => 'html',
                'value' => function($data) {
                    return ($data->getCountSubitems($data->id) != 0) ? Html::a($data->name, ['/categoryexp', 'parent_id' => $data->id]) . ' <small>(' . $data->getCountSubitems($data->id) . ')</small>' : Html::a($data->name, ['/categoryexp', 'parent_id' => $data->id]);
                },
                    ],
                    ['class' => \yii\grid\ActionColumn::className(),
                        'header' => 'Действия',
                        'options' => ['width' => '70px'],
                        'buttons' => [
                            'update' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-pencil"/>', ['update', 'id' => $key, 'parent_id' => $model->parent_id], ['title' => 'Изменить']);
                            },
                                    'delete' => function ($url, $model, $key) {
                                return Html::a('<span class="glyphicon glyphicon-trash"/>', ['delete', 'id' => $key, 'parent_id' => $model->parent_id], ['title' => 'Удалить', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?']);
                            },
                                ],
                                'template' => '{update}  {delete}'
                            ],
                        ],
                    ]);
                    ?>

                    <?php Pjax::end(); ?>

</div>