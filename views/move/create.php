<?php
/* @var $this yii\web\View */
/* @var $model app\models\Move */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Перемещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/move']],
];
?>
<div class="move-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
