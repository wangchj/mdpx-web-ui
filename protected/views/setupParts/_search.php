<?php
/* @var $this SetupPartsController */
/* @var $model SetupParts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'setupPartId'); ?>
		<?php echo $form->textField($model,'setupPartId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'part'); ?>
		<?php echo $form->textField($model,'part',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'port'); ?>
		<?php echo $form->textField($model,'port'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->