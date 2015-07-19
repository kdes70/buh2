<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Update Unit: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Единицы измерения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/unit']],
];
?>
<div class="unit-update">



    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
