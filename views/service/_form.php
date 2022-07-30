<?php

use app\controllers\ServiceController;
use app\models\Pop;
use app\models\Service;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_use_no')->textInput() ?>

    <?= $form->field($model, 'popOrPoint')->dropDownList($items
, [
        'prompt' =>
        [
            'text' => 'for select multiple item use Ctr key',
            'options' => [
                'selected' => true,
                'readonly' => true,
                'disabled' => true,
            ]
        ],
        'multiple' => 'multiple',
        'options' => $keys
    ])
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>