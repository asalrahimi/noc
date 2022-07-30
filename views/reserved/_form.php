<?php

use app\models\Pop;
use app\models\Service;
use app\models\User;
use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reserved */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="reserved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', function ($user) {
            return $user->name . ' ' . $user->family;
        }),
        [
            'prompt' =>
            [
                'text' => 'Select user',
                'options' => [
                    'selected' => true,
                    'readonly' => true,
                    'disabled' => true
                ]
            ],
            'id' => 'user_id',
            'onchange' =>
            '$.post( "' . Yii::$app->urlManager->createUrl('reserved/lists?model=User&property=address&id=') . '"+$(this).val(), function( data ) {
        $( "select#user_address" ).html( data );
      })'
        ]
    )
        ->label('User'); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'address'),
        [
            'prompt' => '',
            'readonly' => true,
            'disabled' => true,
            'id' => 'user_address'
        ]
    )
        ->label('User Address'); ?>

    <?= $form->field($model, 'service_id')->dropDownList(
        ArrayHelper::map(Service::find()->where(['or',['>', 'max_use_no', 0],['id' => $model->service_id]])->all(), 'id', 'name')
,
        [
            'prompt' =>
            [
                'text' => 'Select service name',
                'options' => [
                    'selected'=>true,
                    'readonly' => true,
                    'disabled' => true,
                ]
            ],
            'id' => 'service_name',
            'onchange' =>'
        $.post( "' . Yii::$app->urlManager->createUrl("reserved/lists?selected=$model->pop_id&update=$update&model=Pop&property=name&id=") . '"+$(this).val(), function( data ) {
        $( "select#pop_name" ).html( data );
        $("#pop_name").trigger("change"); 

      });
'])
        ->label('Service Name');
        ?>


    <?= $form->field($model, 'pop_id')->dropDownList(ArrayHelper::map(Pop::find()->where(['>','max_use_no',0])->all(), 'id', 'name'),
        [
            'prompt' =>
            [
                'text' => 'Select pop name',
                'options' => [
                    'selected'=>true,
                    'readonly' => true,
                    'disabled' => true,
                ]
            ],
            'id' => 'pop_name',
            'onchange' => 
                '$.post( "' . Yii::$app->urlManager->createUrl('reserved/lists?model=Pop&property=type&id=') . '"+$(this).val(), function( data ) {
        $( "select#pop_type" ).html( data );
      })'
        ]
    )
        ->label('Pop Name'); ?>

    <?= $form->field($model, 'pop_id')->dropDownList(
        ArrayHelper::map(Pop::find()->all(), 'id', 'type'),
        [
            'prompt' => '',
            'readonly' => true,
            'disabled' => true,
            'id' => 'pop_type',
        ]
    )
        ->label('Pop Type'); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<!-- if this form is rendered for update so only show related points of current service -->
<?php if($update){ 
    $this->registerJs('$("select#service_name").trigger("change");');
 } ?>