<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expensetemp */

$this->title = 'Шаблоны расходов: ID = ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны расходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение ID = ' . $model->id,];

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/expensetemp']],
];
?>


<div class="expensetemp-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
