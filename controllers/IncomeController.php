<?php

namespace app\controllers;

use Yii;
use app\models\Income;
use app\models\IncomeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\classes\Messages;

/**
 * IncomeController implements the CRUD actions for Income model.
 */
class IncomeController extends Controller {

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
     * Lists all Income models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new IncomeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Income model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Income();
        $model->user_id = Yii::$app->user->identity->id;
        $model->date_oper = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($_POST['Income']['continue'] == 1) {
                $model = new Income();
                $model->continue = 1;
                $model->date_oper = date('Y-m-d');
                $model->user_id = Yii::$app->user->identity->id;
                Yii::$app->getSession()->setFlash('created', 'Доход успешно создан...');
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
     * Updates an existing Income model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Income model.
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
     * Finds the Income model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Income the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Income::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
