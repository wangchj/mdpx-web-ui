<?php
/* @var $this ExperimentSetupController */
/* @var $model ExperimentSetup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'setupId'); ?>
		<?php echo $form->textField($model,'setupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dcVoltageSetpoint'); ?>
		<?php echo $form->textField($model,'dcVoltageSetpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dcCurrentSetpoint'); ?>
		<?php echo $form->textField($model,'dcCurrentSetpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rfPowerSetpoint'); ?>
		<?php echo $form->textField($model,'rfPowerSetpoint',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pressureSetpoint'); ?>
		<?php echo $form->textField($model,'pressureSetpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet1Setpoint'); ?>
		<?php echo $form->textField($model,'magnet1Setpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet2Setpoint'); ?>
		<?php echo $form->textField($model,'magnet2Setpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet3Setpoint'); ?>
		<?php echo $form->textField($model,'magnet3Setpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet4Setpoint'); ?>
		<?php echo $form->textField($model,'magnet4Setpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magneticFieldSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldSetpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magneticFieldGradientSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldGradientSetpoint',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gasType1'); ?>
		<?php echo $form->textField($model,'gasType1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gasType2'); ?>
		<?php echo $form->textField($model,'gasType2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dustType1'); ?>
		<?php echo $form->textField($model,'dustType1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dustType2'); ?>
		<?php echo $form->textField($model,'dustType2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->