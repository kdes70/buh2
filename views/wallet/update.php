<?php
/* @var $this yii\web\View */
/* @var $model app\models\Wallet */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Кошельки (счета)', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->name,];



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
