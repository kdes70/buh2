<?php

namespace app\controllers;

use Yii;
use app\models\Exchange;
use app\models\ExchangeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ExchangeController implements the CRUD actions for Exchange model.
 */
class ExchangeController extends Controller {

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
     * Lists all Exchange models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ExchangeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exchange model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Exchange model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Exchange();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Exchange model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Exchange model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exchange model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exchange the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Exchange::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Получение значений курсов валют...
    //public function actionGetExchange($currency_code, $start_date) {
    public function actionGetexchange() {

        //$location = Locations::findOne($zipId);

        $data = <<<JSON
        [{"ccy":"RUR","base_ccy":"UAH","buy":"0.41000","sale":"0.45000"},{"ccy":"EUR","base_ccy":"UAH","buy":"22.00000","sale":"24.50000"},{"ccy":"USD","base_ccy":"UAH","buy":"20.00000","sale":"22.50000"}]        
JSON;



        $json = file_get_contents('https://api.privatbank.ua/p24api/exchange_rates?json&date=10.05.2015');



        echo Json::encode($json);
        //echo $data;
        exit;
    }

}
