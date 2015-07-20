<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
//use nirvana\showloading\ShowLoading;
use timurmelnikov\widgets\ShowLoading;

/* @var $this yii\web\View */
/* @var $model app\models\Exchange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exchange-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'start_date')->widget(
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

    <?= $form->field($model, 'currency_code')->dropDownList(['' => 'Выберите валюту...', 'USD' => 'USD', 'EUR' => 'EUR', 'RUB' => 'RUB']) ?>
    <?= $form->field($model, 'number_units')->textInput([]) ?>


    <?=
    $form->field($model, 'official_exchange', [
        'addon' => [
            'append' => [
                'content' => Html::button('Получить на сегодня...', ['class' => 'btn btn-primary', 'id' => 'get-exchange']),
                'asButton' => true
            ]
        ]
    ])->textInput();

    //http://demos.krajee.com/widget-details/active-field#addon
    ?>


    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изиенить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




<?php
echo ShowLoading::widget(['loadingType' => 1]);

$url = Url::toRoute('/exchange/get-exchange');
$script = <<<JS
$('#get-exchange').click(function () {
    $('#w0').showLoading();
    $.get('$url', {char3: $('#exchange-currency_code').val()}, function (data) {
        
        
        var data = $.parseJSON(data);
        
        $('#exchange-number_units').val(data.size);
        $('#exchange-official_exchange').val(data.rate);
              
        
        $('#w0').hideLoading();
    });
});
JS;


$this->registerJs($script);
?>
