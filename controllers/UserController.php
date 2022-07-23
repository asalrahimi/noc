<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class UserController extends Controller
{
    /**
     * Displays index .
     *
     * @return string
     */
    public function actionIndex()
    {

    // select all users 
    $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('user'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}
