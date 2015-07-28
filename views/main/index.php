<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Expensetemp;
?>
<div class="row">
    <div class="col-md-3 col-lg-3">
        <img class="visible-md visible-lg" src="<?= Yii::$app->request->baseUrl . '/images/logo.png'; ?>" style='width: 100%' alt="<?= Yii::$app->name; ?>">
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
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
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
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
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
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-edit"></span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            <?php
                            foreach (Expensetemp::getAllNamesForList(Yii::$app->user->identity->id) as $val) {
                                echo '<li>' . Html::a($val['name'], ['expense/create', 'tmp' => $val['id']], ['class' => '']) . '</li>';
                            }
                            ?>

                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Перемещения', ['/move'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right">
<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/move/create'], ['class' => 'btn btn-primary']) ?>         
                </td>
                <td class="text-right"> 
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
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

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Журнал операций</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>
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