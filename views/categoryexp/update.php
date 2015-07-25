<?php
/* @var $this yii\web\View */
/* @var $model app\models\Categoryexp */

$this->title = 'Изменение: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории расходов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->name];

$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/categoryexp']],
];
?>
<div class="categoryexp-update">

<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
