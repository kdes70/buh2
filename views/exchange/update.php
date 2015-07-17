<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Exchange */

$this->title = 'Изменение: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Курсы валют', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/exchange']],
];
?>
<div class="exchange-update">



    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
