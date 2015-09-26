<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Growl;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryexpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['menuItems'] = [
    ['label' => 'Создать', 'url' => ['create', 'parent_id' => 0]],
];
?>

<?php if (Yii::$app->session->getFlash('delete-success')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => $this->title,
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('delete-success')
    ]);
    ?>
<?php endif; ?>

<?php if (Yii::$app->session->getFlash('delete-error')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => $this->title,
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('delete-error')
    ]);
    ?>
<?php endif; ?>


<div class="categoryexp-index">

    <?php
    Pjax::begin(['timeout' => 3000,]);

    //Чтобы обрабатывать заголовок через AJAX
    $this->title = 'Категории расходов';
    $this->params['breadcrumbs'][] = $this->title;
    ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'header' => Html::a($searchModel->getAttributeLabel('parent_id'), ['/categoryexp', 'parent_id' => $searchModel->getParentId()]) . ' / ' . Html::a('Создать в текущей', ['create', 'parent_id' => $searchModel->parent_id], ['title' => 'Создать в текущей категории', 'data-pjax' => 0]),
                'format' => 'html',
                //'filter' => Html::a($searchModel->getAttributeLabel('parent_id'), ['create', 'parent_id' => $searchModel->parent_id]),
                'value' => function($data) {
            return Html::a($data->parent->name, ['/categoryexp', 'parent_id' => $data->parent->parent_id]);
        },
            //'options' => ['width' => '400px'],
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
                    //'options' => ['width' => '400px'],
                    ],
                    ['class' => \yii\grid\ActionColumn::className(),
                        'header' => 'Действия',
                        'options' => ['width' => '70px'],
                        'contentOptions' => ['style' => 'text-align: center'],
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