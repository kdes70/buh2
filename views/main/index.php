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







        <!--
                <style type="text/css">
                    .custab{
                        border: 1px solid #ccc;
                        padding: 5px;
                        margin: 5% 0;
                        box-shadow: 3px 3px 2px #ccc;
                        transition: 0.5s;
                    }
                    .custab:hover{
                        box-shadow: 3px 3px 0px transparent;
                        transition: 0.5s;
                    }
                </style>-->



        <table class="table table-striped custab">
            <thead>

                <tr>
                    <th>ID</th>

                    <th>Раздел</th>
                    <th class="text-center">Действие</th>
                </tr>
            </thead>
            <tr>
                <td>1</td>

                <td>Кошельки</td>
                <td class="text-right"><a class='btn btn-primary' href="#"><span class="glyphicon glyphicon-plus-sign"></span> Добавить</a>         <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span> Шаблон
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div></td>
            </tr>


            <tr>
                <td>2</td>

                <td>Доходы</td>
                <td class="text-right"><a class='btn btn-primary' href="#"><span class="glyphicon glyphicon-plus-sign"></span> Добавить</a>         <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span> Шаблон
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div></td>
            </tr>

            <tr>
                <td>3</td>

                <td>Расходы</td>
                <td class="text-right"><a class='btn btn-primary' href="#"><span class="glyphicon glyphicon-plus-sign"></span> Добавить</a>         <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span> Шаблон
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div></td>
            </tr>

            <tr>
                <td>4</td>

                <td>Переводы</td>
                <td class="text-right"><a class='btn btn-primary' href="#"><span class="glyphicon glyphicon-plus-sign"></span> Добавить</a>         <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span> Шаблон
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div></td>
            </tr>
            
            
            <tr>
                <td>5</td>

                <td>Шаблоны</td>
                <td class="text-right"><a class='btn btn-primary' href="#"><span class="glyphicon glyphicon-plus-sign"></span> Добавить</a>         <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span> Шаблон
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div></td>
            </tr>

        </table>



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