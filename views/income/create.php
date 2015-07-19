<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Income */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Доходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/income']],
];
?>
<div class="income-create">



<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
