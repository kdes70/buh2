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
<!--        <style type="text/css">
            .custab{
                border: 1px solid #ccc;
                //padding: 5px;
                //margin: 5% 0;
                box-shadow: 3px 3px 2px #ccc;
                transition: 0.5s;
            }
            .custab:hover{
                box-shadow: 3px 3px 0px transparent;
                transition: 0.5s;
            }
            td, th{

                border: 1px solid #ccc; 
            }
        </style>-->


        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th colspan="1" width="100%">Раздел</th>
                    <th colspan="2" class="text-center">Действие</th>

                </tr>
            </thead>
            <tr>
                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Кошельки', ['/wallet'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right">
                    <?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/wallet/create'], ['class' => 'btn btn-primary']) ?>         
                </td>
                <td class="text-right"> 

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div>
                </td>
            </tr>


            <tr>
                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Доходы', ['/income'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right">
                    <?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/income/create'], ['class' => 'btn btn-primary']) ?>         
                </td>
                <td class="text-right"> 

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div>
                </td>
            </tr>




            <tr>
                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Расходы', ['/expense'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right">
                    <?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/expense/create'], ['class' => 'btn btn-primary']) ?>         
                </td>
                <td class="text-right"> 

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="glyphicon glyphicon-edit"></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div>
                </td>
            </tr>









        </table>
        <!-- Блок управления (конец) -->
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