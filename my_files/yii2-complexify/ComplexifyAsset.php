<?php

namespace timurmelnikov\widgets;

use yii\web\AssetBundle;

class ComplexifyAsset extends AssetBundle {

    public $sourcePath = '@vendor/timurmelnikov/yii2-complexify/assets/js';
    public $js = [
        'jquery.complexify.banlist.js',
    ];
    //Регистрировать после дефолтных скриптов Yii, а именно jQuery
    public $depends = [
        'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapAsset',
    ];

    //public $jsOptions = ['position' => \yii\web\View::POS_END];

    public function init() {

        $this->js[] = YII_DEBUG ? 'jquery.complexify.js' : 'jquery.complexify.min.js';
    }

}
