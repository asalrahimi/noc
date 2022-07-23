<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class ServiceController extends Controller
{
    /**
     * Displays index .
     *
     * @return string
     */
    public function actionIndex()
    {

    // select all services 
    $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('service'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

}
