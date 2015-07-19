<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Изменение: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/user']],
];
?>
<div class="user-update">



    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
