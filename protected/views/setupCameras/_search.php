<?php
/* @var $this SetupCamerasController */
/* @var $model SetupCameras */
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
		<?php echo $form->label($model,'camera'); ?>
		<?php echo $form->textField($model,'camera'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->