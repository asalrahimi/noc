<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserved-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'user_family') ?>

    <?= $form->field($model, 'user_address') ?>

    <?php // echo $form->field($model, 'service_id') ?>

    <?php // echo $form->field($model, 'service_name') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'pop_id') ?>

    <?php // echo $form->field($model, 'pop_name') ?>

    <?php // echo $form->field($model, 'pop_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
