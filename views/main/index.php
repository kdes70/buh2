<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Expensetemp;
use dosamigos\chartjs\ChartJs;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\ButtonGroup;
?>
<div class="row">
    <div class="col-md-3 col-lg-3">
        <img class="visible-md visible-lg" src="<?= Yii::$app->request->baseUrl . '/images/logo.png'; ?>" style='width: 100%' alt="<?= Yii::$app->name; ?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Остстки на сегодня</div>
            </div>     
            <div class="panel-body">


                Наличные - 100.55<br/>
                Карточка Fido - 500.11
                <hr />
                Всего - 600.66


            </div>                     
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Планирование</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>
    </div>
    <div class="col-md-6 col-lg-6">


        <?php
        //Эксперименты с правами в разделе Unit
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
        //Назначение роли пользователю
//        $userRole = Yii::$app->authManager->getRole('admin');
//        Yii::$app->authManager->assign($userRole, 3);



        print_r(ArrayHelper::map(Expensetemp::find()->where(['user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'));
        ?>

        <!-- Блок управления -->


        <!-- Управление по новому TEST (конец)-->
        <?php
        echo ButtonGroup::widget([
            'buttons' => [


                Html::a('<span class="glyphicon glyphicon-eye-open"></span> Расходы', ['/expense'], ['class' => 'btn btn-success btn-block']
                ),
                Html::a('<span class="glyphicon glyphicon-plus-sign"></span>', ['/expense/create'], [
                    'class' => 'btn btn-primary',
                    'title' => 'Создать',
                    'options' => [
                    //'style' => "width:100%"
                    ]
                        ]
                ),
                ButtonDropdown::widget([
                    'label' => '',
                    'dropdown' => [
                        //'items' => ArrayHelper::map(Expensetemp::getAllNamesForList(Yii::$app->user->identity->id), 'id', 'name'),
                        'items' => ArrayHelper::map(Expensetemp::find()->where(['user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
                    /* [
                      ['label' => 'DropdownA', 'url' => '/'],
                      ['label' => 'DropdownB', 'url' => '#'],
                      ],
                      /* */
                    ],
                    'options' => [
                        //'style' => "width:100%",
                        'class' => 'btn-primary',
                        'title' => 'Создать из шаблона...']
                ]),
            ],
            'options' => [
                'class' => 'btn-group-justified',
            ]
        ]);
        ?>
        <!-- TEST (конец)-->



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
                            foreach (Expensetemp::find()->where(['user_id' => Yii::$app->user->identity->id])->all() as $val) {
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
                <p>Выбрать период 01.01.2005 - 10.01.2015</p>

                Потрачено - 45.55 <br />
                Получено - 1232.55


            </div>                     
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Ввод операций</div>
            </div>     
            <div class="panel-body">


                <?=
                ChartJs::widget([
                    'type' => 'Bar',
                    'options' => [
                        'height' => 230,
                        'width' => 230
                    ],
                    'data' => [
                        'labels' => ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль"],
                        'datasets' => [
                            [
                                'fillColor' => "rgba(220,220,220,0.5)",
                                'strokeColor' => "rgba(220,220,220,1)",
                                'pointColor' => "rgba(220,220,220,1)",
                                'pointStrokeColor' => "#fff",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'fillColor' => "rgba(151,187,205,0.5)",
                                'strokeColor' => "rgba(151,187,205,1)",
                                'pointColor' => "rgba(151,187,205,1)",
                                'pointStrokeColor' => "#fff",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                ]);
                ?>

            </div>                     
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Информация</div>
            </div>     
            <div class="panel-body">
                <?=
                ChartJs::widget([
                    'type' => 'Pie',
                    'options' => [
                        'height' => 230,
                        'width' => 230,
                    ],
                    'data' => [
                        [
                            'value' => 300,
                            'color' => "#F7464A",
                            'highlight' => "#FF5A5E",
                            'label' => "Red"
                        ],
                        [
                            'value' => 50,
                            'color' => "#46BFBD",
                            'highlight' => "#5AD3D1",
                            'label' => "Green"
                        ],
                        [
                            'value' => 100,
                            'color' => "#FDB45C",
                            'highlight' => "#FFC870",
                            'label' => "Yellow"
                        ]
                    ]
                ]);
                ?>
            </div>                     
        </div>
    </div>
</div>