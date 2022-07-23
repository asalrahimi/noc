<?php

<<<<<<< HEAD
use app\models\Reserved;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reserveds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserved-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reserved', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'user_name',
            'user_family',
            'user_address',
            //'service_id',
            //'service_name',
            //'service_type',
            //'pop_id',
            //'pop_name',
            //'pop_type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reserved $model, $key, $index, $column) {
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
    <h1 class="col col-10 text-dark ">Reserved Service</h1>
    <div class="col col-2 m-0 my-auto ml-auto">
        <?= Html::a('add reservation', ['/reserved/add'], ['class' => 'btn btn-success']) ?>
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
        <?= Html::a('delete', ['/reserved/delete'], ['class' => 'btn btn-danger w-75']) ?>
    </div>
    <div class="col col-2 mr-auto my-auto">
        <?= Html::a('edit', ['/reserved/edit'], ['class' => 'btn btn-primary w-75']) ?>
    </div>
</div>

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
