<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;

//use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>





<?php if (Yii::$app->session->getFlash('created')): ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?= Yii::$app->session->getFlash('created') ?>
    </div>
<?php endif; ?>




<div class="expense-form">
    <?php
    $form = ActiveForm::begin([
                'enableClientValidation' => FALSE,
                'enableAjaxValidation' => TRUE,
    ]);
    ?>

    <?=
    $form->field($model, 'date_oper')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => FALSE,
        'language' => 'ru',
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>  

    <?=
    $form->field($model, 'wallet_id')->widget(Select2::classname(), [
        //'data' => ArrayHelper::map(Wallet::find()->where(['state' => Wallet::STATE_ACTIVE, 'user_id' => Yii::$app->user->identity->id])->all(), 'id', 'name'),
        'data' => ArrayHelper::map(Wallet::getAllAndCurrentSum(Yii::$app->user->identity->id), 'id', 'name'),
        'language' => 'ru',
        'disabled' => $model->isNewRecord ? false : true,
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
            // Модальное окно для перемещения средств. Пока не нужно...
//        'addon' => [
//            'append' => [
//                'content' => Html::button('<span class="glyphicon glyphicon-refresh"></span>', ['class' => 'btn btn-default', 'id' => 'add-move', 'data-toggle' => "modal", 'data-target' => "#win1", 'disabled' => $model->isNewRecord ? false : true]),
//                'asButton' => true,
//            ]
//        ]
    ])
    ?>

    <?=
    $form->field($model, 'cost')->textInput(['maxlength' => 10,
        'disabled' => $model->isNewRecord ? false : true,])
    ?>

    <?=
    $form->field($model, 'categoryexp_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Categoryexp::getAllForSelect(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'append' => [
                'content' => Html::button('<span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default', 'id' => 'categoryexp-add-button',]),
                'asButton' => true
            ]
        ]
    ])
    ?>

    <div id="categoryexp-add" <?= $model->categoryexp_add ? '' : 'style="display:none"' ?> >
        <?= $form->field($model, 'categoryexp_add')->textInput(['maxlength' => 20,]) ?>
    </div>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 200]) ?>        
    <?= $model->isNewRecord ? $form->field($model, 'continue')->checkbox() : null ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::Button('Сохоанить как шаблон', ['class' => 'btn btn-default',]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>



<?php
// Модальное окно для перемещения средств. Пока не нужно...
//Modal::begin([
//    'header' => '<h4>Перемещение средств</h4>',
//    'id' => 'win1'
//        //'toggleButton' => ['label' => 'click me'],
//]);
//echo 'Окно 1';
//Modal::end();


$script = <<<JS
$('#categoryexp-add-button').click(function () {

    //Изменяем значек на кнопке    
    if ($('#categoryexp-add').css('display') === 'block') {
        $("#categoryexp-add-button span").removeClass("glyphicon-minus");
        $("#categoryexp-add-button span").addClass("glyphicon-plus");
    } else {
        $("#categoryexp-add-button span").removeClass("glyphicon-plus");
        $("#categoryexp-add-button span").addClass("glyphicon-minus");
    }

    //Показываем поле    
    $('#categoryexp-add').toggle('slow');
    $('#expense-categoryexp_add').val(null);
    $('#expense-categoryexp_add').focus();

});
JS;

$this->registerJs($script);
?>
