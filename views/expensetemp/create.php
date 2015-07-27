<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expensetemp */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны расходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/expensetemp']],
];

?>
<div class="expensetemp-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
