<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wallet */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Кошельки (счета)', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/wallet']],
];
?>
<div class="wallet-update">



    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
