<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\widgets\ShowHide;
?>



<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Остстки на сегодня</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Информация</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>


    </div>
    <div class="col-md-6 col-lg-6">
        
        
        
        
            
        
        
        

        <?php
        
           
        
        
        
        
        
        
        
        
//        $exp = Html::beginForm()
//                . Html::dropDownList('parent', 1, [1 => 'rrr', 2 => 'eee']) . '<br/>'
//                . Html::input('text', 'val')
//                . Html::endForm()
//                . Html::a('Создать новую ', '#', array('class' => 'search-button'))
//                . ShowHide::widget(['button' => '.search-button', 'selector' => '#test'])
//                . '<div id="test" style="display:none">'
//                . $this->render('_categoryexp')
//                . '</div>';
        
        
        
        
        
        
        echo yii\bootstrap\Tabs::widget([
            'items' => [
                [
                    'label' => 'Расходы',
                    //'content' => $exp,
                    'content' => $this->render('_expense', [  ]),
                    'options' => ['id' => 'myveryownID'],
                    'active' => true
                ],
                [
                    'label' => 'Доходы',
                    'content' => '353535345345',
                    //'headerOptions' => [...],
                    'options' => ['id' => 'myveryownID1'],
                ],
                [
                    'label' => 'Перемешения',
                    'content' => '1111111111',
                    //'headerOptions' => [...],
                    'options' => ['id' => 'myveryownID2'],
                ],
                [
                    'label' => 'Обмен валют',
                    'content' => '4444444444444444444',
                    //'headerOptions' => [...],
                    'options' => ['id' => 'myveryownID3'],
                ],
            ],
        ]);
        ?>



        <?php
//        echo kartik\select2\Select2::widget([
//            'name' => 'test',
//            'pluginLoading' => FALSE,
//            'data' => array_merge(['' => ''], app\models\Categoryexp::getAllForSelect()),
//            'pluginOptions' => [
//                'allowClear' => true,
//            ],
//        ]);
        ?>















    </div>
    
    
    <!--        <p>Из дерева</p>-->

        <?php
//        echo kartik\select2\Select2::widget([
//            'name' => 'test',
//            //'id'=>'test555',
//            'pluginLoading' => FALSE,
//            'data' => array_merge(['' => ''], app\models\Catexp::getAllForSelect()),
//            'pluginOptions' => [
//                'allowClear' => true,
//            ],
//        ]);
        ?>
    
    
    
    

    <div class="col-md-3 col-lg-3">


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Ввод операций</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Информация</div>
            </div>     
            <div class="panel-body">
            </div>                     
        </div>

    </div>
</div>