<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Expense;
use app\models\ExpenseSearch;
use app\models\Income;
use app\models\IncomeSearch;

class MainController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {


        $modelExpense = new Expense();
        $modelExpense->date_oper = date('Y-m-d');
        //$modelExpense->user_id = Yii::$app->user->identity->id;


        $searchModelExpense = new ExpenseSearch();
        $dataProviderExpense = $searchModelExpense->search(Yii::$app->request->queryParams);



        $modelIncome = new Income();
        $modelIncome->date_oper = date('Y-m-d');
        //$modelExpense->user_id = Yii::$app->user->identity->id;

        $searchModelIncome = new IncomeSearch();
        $dataProviderIncome = $searchModelIncome->search(Yii::$app->request->queryParams);





        return $this->render('index', [
                    'modelExpense' => $modelExpense,
                    'searchModelExpense' => $searchModelExpense,
                    'dataProviderExpense' => $dataProviderExpense,
            
                    'modelIncome' => $modelIncome,
                    'searchModelIncome' => $searchModelIncome,
                    'dataProviderIncome' => $dataProviderIncome,
        ]);




        //return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
