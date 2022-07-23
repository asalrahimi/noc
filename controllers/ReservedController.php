<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class ReservedController extends Controller
{
    /**
     * Displays index .
     *
     * @return string
     */
    public function actionIndex()
    {

        // select all reserved services 
        $query = new Query();

        $dataProvider = new ActiveDataProvider(['query' => $query->from('reserved_service'),]);
        $dataProvider->setSort(false);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}
