<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\MOwner;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hurahura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hurahura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(
	    DatePicker::className(), [
	        'clientOptions' => [
	        	'autoclose'=>true,
		        'format' => 'yyyy-mm-dd',
		        //'minDate' => '2015-08-10',
		        //'maxDate' => '2015-09-10',
			]
	]);?>

    <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_id')->dropDownList(
    		ArrayHelper::map(MOwner::find()->all(),'owner_id','owner_name'),
    		['prompt'=>'Select Owner']
    ) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
