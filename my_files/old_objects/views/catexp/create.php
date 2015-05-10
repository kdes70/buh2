<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Catexp */

$this->title = 'Create Catexp';
$this->params['breadcrumbs'][] = ['label' => 'Catexps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catexp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
