<?php

namespace app\controllers;

use Yii;
use app\models\Expense;
use app\models\ExpenseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Expensetemp;

/**
 * ExpenseController implements the CRUD actions for Expense model.
 */
class ExpenseController extends Controller {

    public $layout = 'column2.php';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Expense models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ExpenseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Expense model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Expense();
        $model->date_oper = date('Y-m-d');
        $model->user_id = Yii::$app->user->identity->id;
        //Для Ajax валидации       
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }
        //Для Ajax валидации (конец)
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($_POST['Expense']['continue'] == 1) {
                $model = new Expense();
                $model->continue = 1;
                $model->date_oper = date('Y-m-d');
                $model->user_id = Yii::$app->user->identity->id;
                Yii::$app->getSession()->setFlash('created', 'Расход успешно создан...');
                return $this->render('create', ['model' => $model,]);
            } else {
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Expense model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);


        //Для Ajax валидации       
        if (Yii::$app->request->isAjax && $model->load($_POST)) {
            Yii::$app->response->format = 'json';
            return \yii\widgets\ActiveForm::validate($model);
        }
        //Для Ajax валидации (конец)


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Expense model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Сохраняет запись об операции в виде шаблона
     * @return mixed
     */
    public function actionSaveAsTemplate($id) {

        $expense = Expense::findOne($id);



        $expensetemp = new Expensetemp();
        $expensetemp->categoryexp_id = $expense->categoryexp_id;
        $expensetemp->cost = $expense->cost;
        $expensetemp->description = $expense->description;
        $expensetemp->user_id = $expense->user_id;
        $expensetemp->wallet_id = $expense->wallet_id;






        if ($expensetemp->save()) {
            Yii::$app->getSession()->setFlash('save-as-template-ok', 'Шаблон операции успешно создан.');
        } else {
            Yii::$app->getSession()->setFlash('save-as-template-error', 'Сохранение не возможно, такой шаблон уже есть.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Expense model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expense the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Expense::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
