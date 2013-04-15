<?php
/* @var $this VesselPlatesController */
/* @var $model VesselPlates */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'side'); ?>
		<?php echo $form->textField($model,'side'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plate'); ?>
		<?php echo $form->textField($model,'plate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->