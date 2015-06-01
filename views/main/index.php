<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\ShowHide;
use kartik\growl\Growl;

//echo Growl::widget([
//    'type' => Growl::TYPE_SUCCESS,
//    'icon' => 'glyphicon glyphicon-ok-sign',
//    'title' => 'Готово!',
//    'showSeparator' => true,
//    'body' => 'Тестовое сообщение...',
//    'pluginOptions' => ['delay' => 3000]
//]);
//
?>


<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Остстки на сегодня</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Контроль расходов</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>


    </div>
    <div class="col-md-6 col-lg-6">





        <!-- Блок управления -->
        <style>
            .custom {
                width: 378px !important;
            }
        </style>


        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default custom">Кошельки</button>
            <button type="button" class="btn btn-primary">Добавить</button>
            <div class="btn-group " role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Шаблон
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Интернет</a></li>
                    <li><a href="#">Пиво</a></li>
                </ul>
            </div>
        </div>
        <hr />

        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default custom">Доходы</button>
            <button type="button" class="btn btn-primary">Добавить</button>
            <div class="btn-group " role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Шаблон
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Интернет</a></li>
                    <li><a href="#">Пиво</a></li>
                </ul>
            </div>
        </div>
        <hr />

        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default custom">Расходы</button>
            <button type="button" class="btn btn-primary">Добавить</button>
            <div class="btn-group " role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Шаблон
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Интернет</a></li>
                    <li><a href="#">Пиво</a></li>
                </ul>
            </div>
        </div>
        <hr />

        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default custom">Переводы</button>
            <button type="button" class="btn btn-primary">Добавить</button>
            <div class="btn-group " role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Шаблон
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Интернет</a></li>
                    <li><a href="#">Пиво</a></li>
                </ul>
            </div>
        </div>
        <hr />

        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default custom">Шаблоны</button>
            <button type="button" class="btn btn-primary">Добавить</button>
            <div class="btn-group " role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Шаблон
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Интернет</a></li>
                    <li><a href="#">Пиво</a></li>
                </ul>
            </div>
        </div>
        <hr />

        <!-- Блок управления (конец) -->






        <?php
//        echo yii\bootstrap\Tabs::widget([
//            'items' => [
//                [
//                    'label' => 'Расходы',
//                    //'content' => $exp,
//                    'content' => $this->render('_expense', ['dataProvider' => $dataProviderExpense, 'searchModel' => $searchModelExpense, 'model' => $modelExpense]),
//                    'options' => ['id' => 'myveryownID'],
//                    'active' => true
//                ],
//                [
//                    'label' => 'Доходы',
//                    'content' => $this->render('_income', ['dataProvider' => $dataProviderIncome, 'searchModel' => $searchModelIncome, 'model' => $modelIncome]),
//                    //'headerOptions' => [...],
//                    'options' => ['id' => 'myveryownID1'],
//                ],
//                [
//                    'label' => 'Переводы',
//                    'content' => 'Переводы...',
//                    //'headerOptions' => [...],
//                    'options' => ['id' => 'myveryownID2'],
//                ],
//            ],
//        ]);
        ?>

    </div>

    <div class="col-md-3 col-lg-3">


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Ввод операций</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Информация</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

    </div>
</div>