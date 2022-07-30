<?php

namespace app\controllers;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
use app\models\Pop;
use app\models\PopSearch;
use app\models\Service;
use app\models\ServicePop;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PopController implements the CRUD actions for Pop model.
 */
class PopController extends Controller
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
     * Lists all Pop models.
<<<<<<< HEAD
=======
=======
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class PopController extends Controller
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
        // read all data from pop table
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
        $searchModel = new PopSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // render index page of points
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pop model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // render view page of points
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pop();

        // check form method and save data in model
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                // check duplicate record
                if (Pop::findOne(['name' => $model->name]) === null) {
                    if ($model->save())
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'pop already exists !');
                }
            } else {
                $model->loadDefaultValues();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        // find selected user record
        $model = $this->findModel($id);

        // set old max_use_no in variable
        $maxUseNo = $model->max_use_no;

        // data validation
        if ($this->request->isPost && $model->load($this->request->post())) {

            // prevent lessen max_use_no
            if ($model->max_use_no >= $maxUseNo) {

                //save data in model (update)
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'update successful !');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->max_use_no = $maxUseNo;
                Yii::$app->session->setFlash('error', 'you can not decrease max_use_no field !');
            }
        }

        // rollback to update form if update failed or it is first time of introit
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        // for delete a pop shouldn't be used anywhere
        if (ServicePop::find()->where(['pop_id' => $id])->all()) {
            Yii::$app->session->setFlash('error', 'this point has service yet , you can not delete it!');
        } else {
            if ($this->findModel($id)->delete()) {
                Yii::$app->session->setFlash('success', 'pop was deleted !');
            } else {
                Yii::$app->session->setFlash('error', 'delete failed !');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Pop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Pop::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
<<<<<<< HEAD
=======
=======

        // select all reserved services 
        $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('pop'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
    }
}
