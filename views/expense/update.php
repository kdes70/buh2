<?php
/* @var $this yii\web\View */
/* @var $model app\models\Expense */

$this->title = 'Изменение: ID = ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Расходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ID = ' . $model->id,];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/expense']],
];
?>
<div class="expense-update">


<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
