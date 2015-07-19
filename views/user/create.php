<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/user']],
];
?>
<div class="user-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
