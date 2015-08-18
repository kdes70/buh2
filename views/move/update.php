<?php
/* @var $this yii\web\View */
/* @var $model app\models\Move */

$this->title = 'Изменение: ID = ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Перемещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ID = ' . $model->id];

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/move']],
];
?>
<div class="move-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
