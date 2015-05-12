<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryincSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoryincs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoryinc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categoryinc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'user_id',
            'name',
            'wallet_default',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
