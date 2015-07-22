<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Move */

$this->title = 'Изменение: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Перемещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/move']],
];
?>
<div class="move-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
