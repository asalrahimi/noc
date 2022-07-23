<?php

<<<<<<< HEAD
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'family',
            'address',
            'phone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
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
    <h1 class="col col-10 text-dark ">Users</h1>
    <div class="col col-lg-2 m-0 my-auto float-right">
        <?= Html::a('add new user', ['/user/add'], ['class' => 'btn btn-success']) ?>
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
        <?= Html::a('delete', ['/user/delete'], ['class' => 'btn btn-danger w-75']) ?>
    </div>
    <div class="col col-2 mr-auto my-auto">
        <?= Html::a('edit', ['/user/edit'], ['class' => 'btn btn-primary w-75']) ?>
    </div>
</div>

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
