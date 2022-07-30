<?php

namespace app\controllers;

<<<<<<< HEAD
use app\models\Pop;
use app\models\PopSearch;
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
use app\models\Reserved;
use app\models\ReservedSearch;
use app\models\Service;
use app\models\ServiceSearch;
use app\models\User;
use app\models\UserSearch;
use app\models\UserService;
use app\models\UserServiceSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservedController implements the CRUD actions for Reserved model.
 */
class ReservedController extends Controller
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
     * Lists all Reserved models.
<<<<<<< HEAD
=======
=======
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class ReservedController extends Controller
{
    /**
     * Displays index .
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
     *
     * @return string
     */
    public function actionIndex()
    {
<<<<<<< HEAD

        // read and show all reserved services
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
        $searchModel = new ReservedSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserved model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // show selected service information
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reserved model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reserved();
        $update = false;

        // save form data in database
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {


                // check duplicate record
                if (Reserved::findOne(['user_id' => $model->user_id]) !== null) {
                    Yii::$app->session->setFlash('error', 'this user got another service !');
                } else {
                    $model->save();
                    $model->afterFind();
                    //decrease max_use_no of selected pop/point and service
                    $this->updateMaxNo($model, '-');

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'update' => $update,


        ]);
    }

    /**
     * Updates an existing Reserved model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->afterFind();
        $oldModel = $model;
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                //increase max_use_no of earlier pop/point and service
                $this->updateMaxNo($oldModel, '+');

                $model->afterFind();
                //decrease max_use_no of new pop/point and service
                $this->updateMaxNo($model, '-');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $serviceModel = new Service();
        $serviceModel->id = $model->service_id;
        $pops = explode(' , ', $serviceModel->getPopOrPoint());
        $update = true;

        return $this->render('update', [
            'model' => $model,
            'update' => $update,
            'pops' => $pops

        ]);
    }

    /**
     * Deletes an existing Reserved model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        //increase max_use_no of deleted pop/point and service
        $this->updateMaxNo($model, '+');
        if ($model->delete())
            Yii::$app->session->setFlash('success', 'reserved service was deleted !');
        else
            Yii::$app->session->setFlash('error', 'delete failed !');

        return $this->redirect(['index']);
    }


    /*
    * function for set dropdowns items
    */
    public function actionLists($model, $property, $id = null, $update = null, $selected = null)
    {
        switch ($model) {
            case "User": {
                    $model = User::find()
                        ->where(['id' => $id])
                        ->all();
                    break;
                }
            case "Service": {
                    $model = Service::find()
                        ->where(['id' => $id])
                        ->all();
                    break;
                }
            case "Pop": {
                    if ($property == 'type') {
                        $model = Pop::find()
                            ->where(["id" => $id])
                            ->all();
                    } elseif ($update) {
                        $model = Pop::find()
                            ->join("INNER JOIN", 'service_pop', 'service_pop.pop_id=pop.id')
                            ->where(["service_pop.service_id" => $id])
                            ->all();
                    } else {
                        $model = Pop::find()
                            ->join("INNER JOIN", 'service_pop', 'service_pop.pop_id=pop.id')
                            ->where(["service_pop.service_id" => $id])
                            ->andFilterWhere(['>', 'pop.max_use_no', 0])
                            ->all();
                    }
                    break;
                }
        }
        foreach ($model as $modelList) {
            echo ("<option value='" . $modelList->id);
            if ($modelList->id == $selected) {
                echo "' selected>";
            } else {
                echo "'>";
            }
            echo $modelList->$property . "</option>";
        }
    }

    /**
     * Finds the Reserved model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Reserved the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserved::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
<<<<<<< HEAD
    }


    // function for decrease max_use_no of used service and pop/point
    public function updateMaxNo($modelObj, $operator)
    {
        //find selected service
        $service = Service::findOne(['name' => $modelObj->service_name]);

        //find selected pop
        $pop = Pop::findOne(['name' => $modelObj->pop_name]);

        if ($operator == '+') {
            $serviceUseNo = $service->max_use_no + 1;
            $popUseNo = $pop->max_use_no + 1;
        } else {
            $serviceUseNo = $service->max_use_no - 1;
            $popUseNo = $pop->max_use_no - 1;
        }

        $service->max_use_no = $serviceUseNo;
        $pop->max_use_no = $popUseNo;

        $pop->save();
        $service->save();
=======
=======

        // select all reserved services 
        $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('reserved_service'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
    }
}
