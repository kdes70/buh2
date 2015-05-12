<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categoryinc */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categoryincs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryinc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'user_id',
            'name',
            'wallet_default',
        ],
    ]) ?>

</div>