<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;

class ShowHide extends Widget {

    
    public $button;
    public $selector;
    public $effect;

    public function init() {
        parent::init();

        if ($this->effect === null) {
            $this->effect = '';
            //$this->effect = 'slow';
        }
    }

    public function run() {



        return Yii::$app->view->registerJs("
      $('".$this->button."').click(function () {
            $('".$this->selector."').toggle('".$this->effect."');
            return false;
        });
        
        $('.search-form').submit(function () {
            $('#price-grid').yiiGridView('update', {
                data: $(this).serialize()
            });
            return false;
        });
      ", 3);
    }

}
