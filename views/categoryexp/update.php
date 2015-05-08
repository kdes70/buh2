<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoryexp */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории расходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/categoryexp']],
];
?>
<div class="categoryexp-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
