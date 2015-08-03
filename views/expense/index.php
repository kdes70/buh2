<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Growl;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расходы';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create']],
];
?>


<?php if (Yii::$app->session->getFlash('save-as-template-ok')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => 'Расходы',
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('save-as-template-ok')
    ]);
    ?>
<?php endif; ?>


<?php if (Yii::$app->session->getFlash('save-as-template-error')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => 'Расходы',
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('save-as-template-error')
    ]);
    ?>
<?php endif; ?>



<div class="expense-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <?php Pjax::begin(['timeout' => 3000]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'date_oper',
                'format' => ['date', 'php:d.m.Y']
            ],
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
                'contentOptions' => ['style' => 'text-align: right; font-weight:bold; color: red'],
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
                        return Html::a('<span class="glyphicon glyphicon-arrow-left"/>', ['delete', 'id' => $key], ['title' => 'Откатить операцию', 'data-method' => 'post', 'data-confirm' => 'Вы уверены, что хотите откатить операцию?']);
                    },
                            'save_as_template' => function ($url, $model, $key) {
                        //return Html::a('<span class="glyphicon glyphicon-save"/>', ['save-as-template', 'id' => $key], ['title' => 'Создать шаблон операции', 'data-method' => 'post', 'data-confirm' => 'Создать на основе данной записи шаблон операции?', 'data-toggle' => "modal", 'data-target' => "#win-confirm-template"]);
                        return Html::a('<span class="glyphicon glyphicon-save"/>', ['save-as-template', 'id' => $key], ['title' => 'Создать шаблон операции', 'data-method' => 'post', 'data-confirm' => 'Создать на основе данной записи шаблон операции?',]);
                    },
                        ],
                        'template' => '{save_as_template} {update} {delete}'
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end(); ?>


        </div>




        <!--        <div class="expense-form">-->
        <?php
        //Модальное окно для для имени шаблона
//            Modal::begin([
//                'header' => '<h4>Создание шаблона операции</h4>',
//                'id' => 'win-confirm-template',
//            ]);
//
//            echo Html::beginForm(
//                    ['save-as-template', 'id' => 39], 'post', ['class' => 'form']);
//
//            echo '<div class="form-group">';
//            echo Html::textInput('id', '39', ['class' => 'form-control']);
//            echo '</div>';
//            echo '<div class="form-group">';
//            echo Html::textInput('name', '', ['class' => 'form-control']);
//            echo '</div>';
//            echo '<div class="form-group">';
//            echo Html::submitButton('Создать шаблон', ['class' => 'btn btn-primary']);
//            echo '</div>';
//            echo Html::endForm();
//            Modal::end();
        ?>
<!--</div>-->