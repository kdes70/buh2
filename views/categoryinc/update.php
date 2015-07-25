<?php
/* @var $this yii\web\View */
/* @var $model app\models\Categoryinc */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории доходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->name];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/categoryinc']],
];
?>
<div class="categoryinc-update">


<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
