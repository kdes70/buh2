<?php

namespace timurmelnikov\widgets;

use yii\base\Widget;

class Complexify extends Widget {

    public function init() {
 
        $view = $this->getView();
         //Регистрация скпиптов complexify
        ComplexifyAsset::register($view);



//Инициализация скрипта

        $s = <<<EOL
(function($) {

	$('#complexify #password').complexify({}, function (valid, complexity) {
		var progressBar = $('#complexify #complexity-bar');

		progressBar.toggleClass('progress-bar-success', valid);
		progressBar.toggleClass('progress-bar-danger', !valid);
		progressBar.css({'width': complexity + '%'});

		$('#complexify #complexity').text(Math.round(complexity) + '%');
	});

})(jQuery);
EOL;

        \Yii::$app->view->registerJs($s, 3);
        
    }

    public function run() {


        $a = <<<EOD
        <div id="complexify">
            <div class="form">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
            </div>
            <div class="progress">
                <div id="complexity-bar" class="progress-bar progress-bar-danger" role="progressbar" style="width: 0%;">
                    <span id="complexity" class="center-block">0%</span>
                </div>
            </div>
        </div>
EOD;




        return $a;
    }

}
