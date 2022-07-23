<?php

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

