<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoryexp */

$this->title = 'Создание ';
$this->params['breadcrumbs'][] = ['label' => 'Категории расходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/categoryexp']],

];

?>
<div class="categoryexp-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
