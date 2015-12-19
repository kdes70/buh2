<?php

use yii\helpers\Html;
use app\models\Expensetemp;
use dosamigos\chartjs\ChartJs;
use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Collapse;
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
                <div class="panel-title">Журнал операций</div>
            </div>     
            <div class="panel-body">
                <p>Выбрать период 01.01.2005 - 10.01.2015</p>
                Потрачено - 45.55 <br />
                Получено - 1232.55
            </div>                     
        </div>

    </div>





    <div class="col-md-6 col-lg-6">
        <!-- Блок управления -->

        <?php
        //Расходы
        $expense = ButtonGroup::widget([
                    'buttons' => [

                        Html::a('<span class="glyphicon glyphicon-eye-open"></span> В раздел', ['/expense'], [
                            'class' => 'btn btn-success btn-block',
                            'title' => 'В раздел',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                        Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Создать', ['/expense/create'], [
                            'class' => 'btn btn-primary',
                            'title' => 'Создать',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                        ButtonDropdown::widget([
                            'label' => 'Шаблоны',
                            //'split' => true,
                            'dropdown' => [
                                'items' => Expensetemp::getItems(),
                            ],
                            'options' => [
                                //'style' => "width:100%",
                                'class' => 'btn-primary',
                                'title' => 'Шаблоны']
                        ]),
                    ],
                    'options' => [
                        'class' => 'btn-group-justified',
                    ]
        ]);



        //Доходы
        $income = ButtonGroup::widget([
                    'buttons' => [

                        Html::a('<span class="glyphicon glyphicon-eye-open"></span> В раздел', ['/income'], [
                            'class' => 'btn btn-success btn-block',
                            'title' => 'В раздел',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                        Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Создать', ['/income/create'], [
                            'class' => 'btn btn-primary',
                            'title' => 'Создать',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                    ],
                    'options' => [
                        'class' => 'btn-group-justified',
                    ]
        ]);


        //Кошельки
        $wallet = ButtonGroup::widget([
                    'buttons' => [

                        Html::a('<span class="glyphicon glyphicon-eye-open"></span> В раздел', ['/wallet'], [
                            'class' => 'btn btn-success btn-block',
                            'title' => 'В раздел',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                        Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Создать', ['/wallet/create'], [
                            'class' => 'btn btn-primary',
                            'title' => 'Создать',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                    ],
                    'options' => [
                        'class' => 'btn-group-justified',
                    ]
        ]);


        //Перемещения
        $move = ButtonGroup::widget([
                    'buttons' => [

                        Html::a('<span class="glyphicon glyphicon-eye-open"></span> В раздел', ['/move'], [
                            'class' => 'btn btn-success btn-block',
                            'title' => 'В раздел',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                        Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Создать', ['/move/create'], [
                            'class' => 'btn btn-primary',
                            'title' => 'Создать',
                            'options' => [
                            //'style' => "width:100%"
                            ]
                                ]
                        ),
                    ],
                    'options' => [
                        'class' => 'btn-group-justified',
                    ]
        ]);


        //Виджет блока управления главной страницы
        echo Collapse::widget([
            'encodeLabels' => FALSE,
            'items' => [
                // equivalent to the above
                [
                    'label' => '<img src="' . Yii::$app->request->baseUrl . '/images/section/expense.png' . ' "width="85" "alt="альтернативный текст" > Расходы',
                    'content' => $expense,
                    // open its content by default
                    'contentOptions' => ['class' => 'in']
                ],
                [
                    'label' => '<img src="' . Yii::$app->request->baseUrl . '/images/section/income.png' . ' "width="85" "alt="альтернативный текст" > Доходы',
                    'content' => $income,
                ],
                [
                    'label' => '<img src="' . Yii::$app->request->baseUrl . '/images/section/wallet.png' . ' "width="85" "alt="альтернативный текст" > Кошельки',
                    'content' => $wallet,
                ],
                [
                    'label' => '<img src="' . Yii::$app->request->baseUrl . '/images/section/move.png' . ' "width="85" "alt="альтернативный текст" > Перемещения',
                    'content' => $move,
                ],
                [
                    'label' => '<img src="' . Yii::$app->request->baseUrl . '/images/section/list.png' . ' "width="85" "alt="альтернативный текст" > Списки покупок',
                    'content' => 'Реализовать раздел',
                ],
            ]
        ]);
        ?>
        <!-- Блок управления (конец) -->


    </div>
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Статистика</div>
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


<?php
//Открытие панелей при наведении мыши
$script = <<<JS
$(document).ready(function(){
   $( ".collapse-toggle" ).mouseover(function(){
      $(this).click();
   });
});   
JS;
$this->registerJs($script);
