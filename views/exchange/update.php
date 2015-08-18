<?php
/* @var $this yii\web\View */
/* @var $model app\models\Exchange */

$this->title = 'Изменение: ID = ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Курсы валют', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ID = ' . $model->id];

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/exchange']],
];
?>
<div class="exchange-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
