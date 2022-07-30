<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        [
            'pop'=>'pop',
            'point'=>'point'
        ],
        [
            'prompt' => 'Select Option',
        ]
    ) ?>

    <?= $form->field($model, 'max_use_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>