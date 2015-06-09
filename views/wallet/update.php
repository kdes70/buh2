<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Wallet */

$this->title = 'Update Wallet: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/wallet']],
];
?>
<div class="wallet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
