<?php

use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет 3';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [

    ['label' => 'XXXX', 'url' => ['#']],
];
?>
<div class="rep1-index">



    <?=
    ChartJs::widget([
        'type' => 'Radar',
        
        'options' => [
            'height' => 400,
            'width' => 800
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
