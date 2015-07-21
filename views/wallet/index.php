<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Wallet;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WalletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кошельки (счета)';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuItems'] = [

    ['label' => 'Создать', 'url' => ['create',]],
];
?>
<div class="wallet-index">


    <?php Pjax::begin(['timeout' => 3000]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'name',
            'current_sum',
            [
                'attribute' => 'state',
                'value' => 'state',
                'filter' => Html::activeDropDownList($searchModel, 'state', [Wallet::STATE_ACTIVE => 'Активен', Wallet::STATE_CLOSE => 'Закрыт'], ['class' => 'form-control', 'prompt' => 'Выберите...']),
            ],
            'user_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>









    <?php Pjax::end(); ?>

</div>
