<?php

use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчет 4';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [
    ['label' => 'XXXX', 'url' => ['#']],
];
?>
<div class="rep1-index">



    <?=
    ChartJs::widget([
        'type' => 'Pie',
        'options' => [
            'height' => 400,
            'width' => 800
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
