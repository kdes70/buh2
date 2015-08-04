<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Wallet;
use kartik\widgets\Growl;
use app\models\Categoryexp;
use app\models\Unit;

//use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Expense */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if (Yii::$app->session->getFlash('created')): ?>
    <?php
    echo Growl::widget([
        'type' => Growl::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'title' => 'Расходы',
        'showSeparator' => true,
        'body' => Yii::$app->session->getFlash('created')
    ]);
    ?>
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
    ])
    ?>

    <?=
    $form->field($model, 'cost', [
        'addon' => [
            'append' => [
                'content' => Html::button('<span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default', 'id' => 'unit-edit-button', 'title' => 'Дополнительно']),
                'asButton' => true
            ]
        ]
    ])->textInput(['maxlength' => 10,
        'disabled' => $model->isNewRecord ? false : true,
    ]);
    ?>

    <div id="unit-edit" class="well well-sm" <?= $model->categoryexp_add ? '' : 'style="display:none"' ?> >
        <?=
        $form->field($model, 'count_unit')->textInput(['maxlength' => 10])
        ?>
        <?=
        $form->field($model, 'unit_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Unit::find()->all(), 'id', 'fullname'),
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите...'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])
        ?>
    </div>

    <?=
    $form->field($model, 'categoryexp_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Categoryexp::getAllForSelect(), 'id', 'name'),
        'language' => 'ru',
        //'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Выберите...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'append' => [
                'content' => Html::button('<span class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default', 'id' => 'categoryexp-add-button', 'title' => 'Новая категория']),
                'asButton' => true
            ]
        ]
    ])
    ?>

    <div id="categoryexp-add"  class="well  well-sm" <?= $model->categoryexp_add ? '' : 'style="display:none"' ?> >
        <?= $form->field($model, 'categoryexp_add')->textInput(['maxlength' => 20,]) ?>
    </div>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 200]) ?>        
    <?= $model->isNewRecord ? $form->field($model, 'continue')->checkbox() : null ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


<?php
$script = <<<JS
$('#unit-edit-button').click(function () {
    //Изменяем значек на кнопке    
    if ($('#unit-edit').css('display') === 'block') {
        $("#unit-edit-button span").removeClass("glyphicon-minus");
        $("#unit-edit-button span").addClass("glyphicon-plus");
    } else {
        $("#unit-edit-button span").removeClass("glyphicon-plus");
        $("#unit-edit-button span").addClass("glyphicon-minus");
    }
    //Показываем поле    
    $('#unit-edit').toggle();    
    $('#expense-count_unit').focus();

});
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
    $('#categoryexp-add').toggle();    
    $('#expense-categoryexp_add').val(null);
    $('#expense-categoryexp_add').focus();
});
JS;

$this->registerJs($script);
?>