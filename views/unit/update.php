<?php
/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Единицы измерения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->name];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/unit']],
];
?>
<div class="unit-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
