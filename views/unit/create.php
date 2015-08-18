<?php
/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Единицы измерения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/unit']],
];
?>
<div class="unit-create">


<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
