<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pop */

$this->title = 'Create Pop';
$this->params['breadcrumbs'][] = ['label' => 'Pops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
