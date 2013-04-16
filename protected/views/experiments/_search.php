<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'experimentId'); ?>
		<?php echo $form->textField($model,'experimentId'); ?>
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
		<?php echo $form->label($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'researcherId'); ?>
		<?php echo $form->textField($model,'researcherId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operatorId'); ?>
		<?php echo $form->textField($model,'operatorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setupId'); ?>
		<?php echo $form->textField($model,'setupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExpDataPath'); ?>
		<?php echo $form->textField($model,'ExpDataPath',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->