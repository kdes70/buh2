<?php

namespace app\controllers;

use yii\web\Controller;

class ReportController extends Controller {

    public $layout = 'column2.php';

    public function actionRep1() {
        return $this->render('rep1');
    }

    public function actionRep2() {
        return $this->render('rep2');
    }

    public function actionRep3() {
        return $this->render('rep3');
    }

    public function actionRep4() {
        return $this->render('rep4');
    }

}
