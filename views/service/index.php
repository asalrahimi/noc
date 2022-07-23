<?php

<<<<<<< HEAD
use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'type',
            'max_use_no',
            'pop_or_point',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Service $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
=======
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div class="row">
    <h1 class="col col-10 text-dark ">Services</h1>
    <div class="col col-lg-2 m-0 my-auto float-right">
        <?= Html::a('add new service', ['/service/add'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{summary}\n{pager}",
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'columns' => [
        
    ],
]); ?>

<div class="row px-auto">
    <div class="col col-2 ml-auto my-auto">
        <?= Html::a('delete', ['/service/delete'], ['class' => 'btn btn-danger w-75']) ?>
    </div>
    <div class="col col-2 mr-auto my-auto">
        <?= Html::a('edit', ['/service/edit'], ['class' => 'btn btn-primary w-75']) ?>
    </div>
</div>

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
