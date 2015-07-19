<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expense */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/expense']],
];
?>
<div class="expense-update">


<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
