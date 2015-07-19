<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wallet */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Кошельки (счета)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/wallet']],
];
?>
<div class="wallet-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
