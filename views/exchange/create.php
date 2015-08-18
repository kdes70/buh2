<?php
/* @var $this yii\web\View */
/* @var $model app\models\Exchange */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Курсы валют', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/exchange']],
];
?>
<div class="exchange-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
