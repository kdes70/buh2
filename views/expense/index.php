<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExpenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expense-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expense', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php yii\widgets\Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'cost',
            'amount',
            'unit_id',
            'categoryexp_id',
            // 'name',
            // 'date_oper',
            // 'user_id',
            // 'operwallet_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php yii\widgets\Pjax::end(); ?>


</div>
