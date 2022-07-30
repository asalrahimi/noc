<?php

namespace app\controllers;

<<<<<<< HEAD
use app\models\Reserved;
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
use app\models\User;
use app\models\UserSearch;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
<<<<<<< HEAD
=======
=======
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class UserController extends Controller
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
        // show all users
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // show  selected user information
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        // check form method
        if ($this->request->isPost) {

            // save new user in database
            if ($model->load($this->request->post())) {
                
                // check duplicate record
                if (User::findOne(['name' => $model->name, 'family' => $model->family, 'address' => $model->address]) === null) {
                    if ($model->save())
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'user already exists !');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // get selected user information for update
        $model = $this->findModel($id);

        // check form method and update user information
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        // search selected user in reserved service table( selected user must not have any services )
        if (Reserved::find()->where(['user_id' => $id])->all()) {
            Yii::$app->session->setFlash('error', 'this user has service yet , you can not delete account!');
        } else {
            if ($this->findModel($id)->delete()) {
                Yii::$app->session->setFlash('success', 'User was deleted !');
            } else {
                Yii::$app->session->setFlash('error', 'delete failed !');
            }
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
<<<<<<< HEAD
=======
=======

    // select all users 
    $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('user'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
}
