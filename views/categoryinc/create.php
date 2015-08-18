<?php
/* @var $this yii\web\View */
/* @var $model app\models\Categoryinc */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Категории доходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/categoryinc']],
];
?>
<div class="categoryinc-create">



<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
