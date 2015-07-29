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


        <?php
//        $role = Yii::$app->authManager->createRole('admin');
//        $role->description = 'Админ';
//        Yii::$app->authManager->add($role);
//
//        $role = Yii::$app->authManager->createRole('user');
//        $role->description = 'Юзер';
//        Yii::$app->authManager->add($role);


//        $permit = Yii::$app->authManager->createPermission('deleteUser');
//        $permit->description = 'Право удалять пользователя';
//        Yii::$app->authManager->add($permit);
        ?>

        <!-- Блок управления -->
        <!-- Заголовок -->
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th colspan="1">Раздел</th>
                    <th colspan="2" class="text-center">Действие</th>
                </tr>
            </thead>
            <!-- Заголовок (конец) -->
            <tr>
                <td colspan="1"><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Кошельки', ['/wallet'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right" colspan="2">
<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/wallet/create'], ['class' => 'btn btn-primary', 'title' => 'Создать', 'style' => "width:100%"]) ?>         
                </td>
            </tr>
            <tr>
                <td colspan="1"><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Доходы', ['/income'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right" colspan="2">
<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/income/create'], ['class' => 'btn btn-primary', 'title' => 'Создать', 'style' => "width:100%"]) ?>         
                </td>
            </tr>
            <tr>
                <td><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Расходы', ['/expense'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right">
<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/expense/create'], ['class' => 'btn btn-primary', 'title' => 'Создать', 'style' => "width:100%"]) ?>         
                </td>
                <td class="text-right"> 
                    <div class="btn-group" role="group" style = "width:100%">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" title="Создать из шаблона" style = "width:100%">
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
                <td colspan="1"><?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> Перемещения', ['/move'], ['class' => 'btn btn-success btn-block']) ?></td>
                <td class="text-right" colspan="2">
<?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/move/create'], ['class' => 'btn btn-primary', 'title' => 'Создать', 'style' => "width:100%"]) ?>         
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


<!--Памятка - что нужно реализовать-->
<hr />

<h2>Реализовать</h2>

<h3>Раздел "Главная страница":</h3>
<ul>
    <li>Кнопкам управления присвоить - 'style' => "width:100%". В принципе слелал. Но... Криво...</li>
    <li>Закинул на нее код работы с RBAC <a href="http://developer.uz/blog/rbac-%D1%80%D0%BE%D0%BB%D0%B8-%D0%B8-%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D0%B8-%D0%B2-yii2/">ссылка</a></li>

</ul>



<h3>Раздел "Перемещения":</h3>
<ul>
    <li>Внутреннее - свой-свой кошелек</li>
    <li>Исходящее - свой-чужой кошелек</li>
    <li>Входящее - чужой-свой кошелек</li>
</ul>
<!--Памятка - что нужно реализовать (конец)-->