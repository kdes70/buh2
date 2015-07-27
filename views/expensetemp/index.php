<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpensetempSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expensetemps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expensetemp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expensetemp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cost',
            'categoryexp_id',
            'description',
            'user_id',
            // 'wallet_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
