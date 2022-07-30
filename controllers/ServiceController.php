<?php

namespace app\controllers;

use app\models\Pop;
use app\models\Reserved;
use app\models\Service;
use app\models\ServicePop;
use app\models\ServiceSearch;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rbac\Item;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Service models.
     *
     * @return string
     */
    public function actionIndex()
    {

        // read and show all services
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->getPopOrPoint();


        // show selected service information
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Service();

        // check form method
        if ($this->request->isPost) {
            // save new service to database
            if ($model->load($this->request->post())) {
                $pops = ($_POST['Service']['popOrPoint']);
                // check duplication
                if (!($model->duplicateService($pops,$model->name))) {
                    // save service in db
                    if ($model->save()) {
                        // save pop_id and service_id in service_pop table
                        foreach ($pops as $pop) {
                            $popService = new ServicePop();
                            $popService->service_id = $model->id;
                            $popService->pop_id = (int)$pop;
                            if ($popService->validate())
                                $popService->save();
                            else
                                Yii::$app->session->setFlash('error', "service not validate !");
                        }
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'service already exists !');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        $items = ArrayHelper::map(Pop::find()
            ->where(['>', 'max_use_no', 0])->all(), 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'items' => $items

        ]);
    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // find selected service record in table for update
        $model = $this->findModel($id);
        $model->getPopOrPoint();
        // set old max_use_no in variable
        $maxUse = $model->max_use_no;
        if ($this->request->isPost && $model->load($this->request->post())) {

            // prevent lessen of max_use_no
            if ($model->max_use_no < $maxUse) {
                $model->max_use_no = $maxUse;
                Yii::$app->session->setFlash('error', 'you can not decrease the (Max Use No) field');
            } else {
                $points = ($_POST['Service']['popOrPoint']);

                // save service in db
                if ($model->save()) {
                    // delete old info from service_pop table
                    ServicePop::deleteAll(['service_id' => $id]);
                    // save pop_id and service_id in service_pop table
                    foreach ($points as $pop) {
                        $popService = new ServicePop();
                        //set service info in ServicePop model
                        $popService->service_id = $model->id;
                        $popService->pop_id = (int)$pop;
                        //save new service in service_pop table
                        if ($popService->validate())
                            $popService->save();
                        else
                            Yii::$app->session->setFlash('error', "service not validate !");
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        $keys = [];
        // get pops of service for update
        $pops = explode(' , ', $model->getPopOrPoint());
        //get all valid pops
        $items = ArrayHelper::map(Pop::find()
            ->where(['OR', ['>', 'max_use_no', 0], ['name' => $pops]])->all(), 'id', 'name');

        // set all of this service pops as selected item in key array
        foreach ($items as $key=>$value) {
            if (isset($items[$key])) {
                if (in_array($items[$key], $pops)) {
                    $keys[$key] = ['selected' => true];
                }
            }
        }


        // rollback to update form if update failed or it is first time of introit
        return $this->render('update', [
            'model' => $model,
            'items' => $items,
            'keys' => $keys
        ]);
    }

    /*
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // for delete a service shouldn't be used anywhere
        if (Reserved::find()->where(['service_id' => $id])->all()) {
            Yii::$app->session->setFlash('error', 'this serivce is reserved by users , you can not delete it!');
        } else {
            // delete service from service and service_pop table
            if ($this->findModel($id)->delete()) {
                ServicePop::deleteAll(['service_id' => $id]);
                Yii::$app->session->setFlash('success', 'service was deleted !');
            } else {
                Yii::$app->session->setFlash('error', 'delete failed !');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
