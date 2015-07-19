<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expense */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/expense']],
];
?>
<div class="expense-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
