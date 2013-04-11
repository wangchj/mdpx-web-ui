<?php
/* @var $this PartsController */
/* @var $model Parts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'chamberType'); ?>
		<?php echo $form->textField($model,'chamberType'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sideId'); ?>
		<?php echo $form->textField($model,'sideId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->