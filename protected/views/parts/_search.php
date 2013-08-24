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

	<div>
		<?php echo $form->label($model,'serialNum'); ?>
		<?php echo $form->textField($model,'serialNum',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<!-- div>
		<?php //echo $form->label($model,'name'); ?>
		<?php //echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
	</div -->

	<div>
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<!-- div>
		<?php //echo $form->label($model,'description'); ?>
		<?php //echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
	</div -->

	<div>
		<?php echo $form->label($model,'addedOn'); ?>
		<?php echo $form->textField($model,'addedOn'); ?>
	</div>

	<div>
		<?php echo $form->label($model,'addedBy'); ?>
		<?php echo $form->textField($model,'addedBy'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->