<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoryinc */

$this->title = 'Create Categoryinc';
$this->params['breadcrumbs'][] = ['label' => 'Categoryincs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryinc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
