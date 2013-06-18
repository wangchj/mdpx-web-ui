<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'measurements-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'measurementId'); ?>
		<?php echo $form->textField($model,'measurementId',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'measurementId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'experimentSetupId'); ?>
		<?php echo $form->textField($model,'experimentSetupId'); ?>
		<?php echo $form->error($model,'experimentSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
		<?php echo $form->error($model,'dateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dcVoltage'); ?>
		<?php echo $form->textField($model,'dcVoltage',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcVoltage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dcCurrent'); ?>
		<?php echo $form->textField($model,'dcCurrent',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcCurrent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rfPower'); ?>
		<?php echo $form->textField($model,'rfPower',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'rfPower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'massFlow'); ?>
		<?php echo $form->textField($model,'massFlow',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'massFlow'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pressure'); ?>
		<?php echo $form->textField($model,'pressure',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'pressure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet1'); ?>
		<?php echo $form->textField($model,'magnet1',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet2'); ?>
		<?php echo $form->textField($model,'magnet2',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet3'); ?>
		<?php echo $form->textField($model,'magnet3',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet4'); ?>
		<?php echo $form->textField($model,'magnet4',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magneticField'); ?>
		<?php echo $form->textField($model,'magneticField',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticField'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magneticFieldGradient'); ?>
		<?php echo $form->textField($model,'magneticFieldGradient',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticFieldGradient'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataPath'); ?>
		<?php echo $form->textField($model,'dataPath',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'dataPath'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->