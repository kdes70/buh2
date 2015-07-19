<?php

namespace app\controllers;

use Yii;
use app\models\Unit;
use app\models\UnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
