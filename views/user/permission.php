<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Назначение ролей пользователю: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Назначение ролей пользователю: ' . $model->username];


$this->params['menuItems'] = [
    ['label' => 'Назад', 'url' => ['/user']],
];
?>

<div class="user-permission">


    <?php $form = ActiveForm::begin(); ?>

    <?php
    $authItems = ArrayHelper::map($authItems, 'name', 'description');
    ?>
    <div class="form-group">
        <?= $form->field($model, 'permissions', ['options' => ['class' => 'checkbox1']])->checkboxList($authItems) ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>