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
    <?= $form->field($model, 'number_units')->textInput() ?>
    <?= $form->field($model, 'currency_code')->dropDownList(['' => 'Выберите валюту...', 'USD' => 'USD', 'EUR' => 'EUR', 'RUR' => 'RUR']) ?>



    <?=
    $form->field($model, 'official_exchange', [
        'addon' => [
            'append' => [
                'content' => Html::button('Получить...', ['class' => 'btn btn-primary', 'id' => 'get-exchange']),
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

echo ShowLoading::widget(['loadingType' => 4]);


$url = Url::toRoute('/exchange/get-exchange');

$script = <<<JS
$('#get-exchange').click(function () {
    $('#w0').showLoading();
    var zipId = 3; //Формирование параметра - var zipId = $(this).val();
    $.get('$url', {zipId: zipId}, function (data) {
        var currency_code = $('#exchange-currency_code').val();
        var data = $.parseJSON(data);
        $.each(data, function (idx, obj) {
            if (obj.ccy == currency_code)
                $('#exchange-official_exchange').attr('value', obj.buy);
        });
        $('#w0').hideLoading();
    });
});
JS;

$this->registerJs($script);
?>
