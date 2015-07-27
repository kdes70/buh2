<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expensetemp */

$this->title = 'Create Expensetemp';
$this->params['breadcrumbs'][] = ['label' => 'Expensetemps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expensetemp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
