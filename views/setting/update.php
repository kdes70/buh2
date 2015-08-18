<?php
/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->name];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/setting']],
];
?>
<div class="setting-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
