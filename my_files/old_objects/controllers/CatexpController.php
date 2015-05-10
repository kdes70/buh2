<?php

namespace app\controllers;

use Yii;
use app\models\Catexp;
use app\models\CatexpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatexpController implements the CRUD actions for Catexp model.
 */
class CatexpController extends Controller {

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
     * Lists all Catexp models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CatexpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catexp model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Catexp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Catexp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Catexp model.
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
     * Deletes an existing Catexp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Catexp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catexp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Catexp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Работа с деревом

    /**
     * Создать корневой узел
     */
    public function actionMakeroot() {
        $countries = new Catexp(['name' => 'Корень']);
        $countries->makeRoot();
    }

    /**
     * Создать узел в качестве последнего дочернего узла
     */
    public function actionMakechild() {

        //Получаем корневой узел
        $countries = Catexp::findOne(['name' => 'Корень']);

        $australia = new Catexp(['name' => 'Коммунальные услуги']);
        $australia->appendTo($countries);
    }

    /**
     * Создать узел в качестве первого дочернего узла
     */
    public function actionMakechildbef() {

        //Получаем корневой узел
        $countries = Catexp::findOne(['name' => 'Коммунальные услуги']);

        $australia = new Catexp(['name' => 'Электричество']);
        $australia->prependTo($countries);
    }

    /**
     * Удалить узел с дочерними
     */
    public function actionDeletenode() {

        //Получаем узел
        $countries = Catexp::findOne(['name' => 'Countries']);
        $countries->deleteWithChildren($countries);
    }

    
    
        /**
     * Переместить узел по иерархии
     */
    public function actionMooveroot() {

        //Получаем узел
        
        
        $node = Catexp::findOne(18);
        //$node->;
        
        
        //$countries = Catexp::findOne(['name' => 'Коммунальные услуги']);
        //$countries->moveNode(1, 2);
    }
    
    
    
    
    //Работа с деревом(конец)
}
