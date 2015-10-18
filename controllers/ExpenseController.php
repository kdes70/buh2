<?php

namespace app\controllers;

use Yii;
use app\models\Expense;
use app\models\ExpenseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Expensetemp;
use yii\helpers\Html;
use app\classes\Messages;

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
    public function actionCreate($tmp = 0) {
        $model = new Expense();
        $model->date_oper = date('Y-m-d');
        $model->unit_id = 1;
        $model->count_unit = 1;

        $model->user_id = Yii::$app->user->identity->id;


        if ($tmp > 0) {
            $model->cost = Expensetemp::findOne($tmp)->cost;
            $model->unit_id = Expensetemp::findOne($tmp)->unit_id;
            $model->count_unit = Expensetemp::findOne($tmp)->count_unit;
            $model->wallet_id = Expensetemp::findOne($tmp)->wallet_id;
            $model->categoryexp_id = Expensetemp::findOne($tmp)->categoryexp_id;
            $model->description = Expensetemp::findOne($tmp)->description;
        }

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
                $model->unit_id = 1;
                $model->count_unit = 1;
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
        if ($this->findModel($id)->delete()) {
            Yii::$app->getSession()->setFlash('delete-success', Messages::ROLLBACK_SUCCESS);
        }
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
        $expensetemp->name = $expense->categoryexp->name;
        $expensetemp->unit_id = $expense->unit_id;
        $expensetemp->count_unit = $expense->count_unit;

        if ($expensetemp->save()) {
            Yii::$app->getSession()->setFlash('save-as-template-success', 'Шаблон операции "' . $expensetemp->name . '" успешно создан.<hr/>' . Html::a('Изменить шаблон', ['expensetemp/update', 'id' => $expensetemp->id], ['class' => 'btn btn-primary btn-sm']));
        } else {
            Yii::$app->getSession()->setFlash('save-as-template-error', 'Шаблон такой операции уже существует.<hr/>' . Html::a('Перейти к шаблонам', ['/expensetemp'], ['class' => 'btn btn-primary btn-sm']));
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
