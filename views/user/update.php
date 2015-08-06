<?php
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Изменение: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Изменение: ' . $model->username];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/user']],
];
?>
<div class="user-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
