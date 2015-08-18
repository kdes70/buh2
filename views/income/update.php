<?php
/* @var $this yii\web\View */
/* @var $model app\models\Income */

$this->title = 'Изменение: ID = ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Доходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ID = ' . $model->id];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/income']],
];
?>
<div class="income-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
