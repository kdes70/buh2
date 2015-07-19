<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/setting']],
];
?>
<div class="setting-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
