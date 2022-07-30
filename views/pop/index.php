<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
use app\models\Pop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'type',
            'max_use_no',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pop $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
<<<<<<< HEAD
=======
=======
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div class="row">
    <h1 class="col col-10 text-dark ">Pop or Point</h1>
    <div class="col col-lg-2 m-0 my-auto float-right">
        <?= Html::a('add new point', ['/pop/add'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{summary}\n{pager}",
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'columns' => [
        
    ],
]); ?>

<div class="row px-auto mt-4">
    <div class="col col-2 ml-auto my-auto">
        <?= Html::a('delete', ['/pop/delete'], ['class' => 'btn btn-danger w-75']) ?>
    </div>
    <div class="col col-2 mx-auto my-auto">
        <?= Html::a('edit', ['/pop/edit'], ['class' => 'btn btn-primary w-75']) ?>
    </div>
    <div class="col col-2 mr-auto my-auto">
        <?= Html::a('view', ['/pop/view'], ['class' => 'btn btn-warning w-75']) ?>
    </div>
</div>

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
