<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'measurementId'); ?>
		<?php echo $form->textField($model,'measurementId',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'experimentSetupId'); ?>
		<?php echo $form->textField($model,'experimentSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dcVoltage'); ?>
		<?php echo $form->textField($model,'dcVoltage',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dcCurrent'); ?>
		<?php echo $form->textField($model,'dcCurrent',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rfPower'); ?>
		<?php echo $form->textField($model,'rfPower',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'massFlow'); ?>
		<?php echo $form->textField($model,'massFlow',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pressure'); ?>
		<?php echo $form->textField($model,'pressure',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet1'); ?>
		<?php echo $form->textField($model,'magnet1',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet2'); ?>
		<?php echo $form->textField($model,'magnet2',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet3'); ?>
		<?php echo $form->textField($model,'magnet3',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magnet4'); ?>
		<?php echo $form->textField($model,'magnet4',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magneticField'); ?>
		<?php echo $form->textField($model,'magneticField',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magneticFieldGradient'); ?>
		<?php echo $form->textField($model,'magneticFieldGradient',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dataPath'); ?>
		<?php echo $form->textField($model,'dataPath',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->