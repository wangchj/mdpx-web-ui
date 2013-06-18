<?php
/* @var $this VesselSetupsController */
/* @var $model VesselSetups */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

    <?php /*
	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'upperElectrode'); ?>
		<?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lowerElectrode'); ?>
		<?php echo $form->textField($model,'lowerElectrode',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roughPump'); ?>
		<?php echo $form->textField($model,'roughPump',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turboPump'); ?>
		<?php echo $form->textField($model,'turboPump',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'massFlowController'); ?>
		<?php echo $form->textField($model,'massFlowController',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pressureGauge'); ?>
		<?php echo $form->textField($model,'pressureGauge',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dustShaker'); ?>
		<?php echo $form->textField($model,'dustShaker',array('size'=>10,'maxlength'=>10)); ?>
	</div>
    */ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->