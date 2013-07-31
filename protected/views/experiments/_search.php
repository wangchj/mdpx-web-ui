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

	<div>
		<?php echo $form->label($model,'experimentId'); ?>
		<?php echo $form->textField($model,'experimentId'); ?>
	</div>

	<div>
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div>
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div>
		<?php echo $form->label($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'isProgrammed'); ?>
        <?php echo $form->dropDownList($model,'isProgrammed',array('1'=>'Yes','0'=>'No')); ?>
    </div>

	<div>
		<?php echo $form->label($model,'researcherId'); ?>
		<?php echo $form->textField($model,'researcherId'); ?>
	</div>

	<div>
		<?php echo $form->label($model,'operatorId'); ?>
		<?php echo $form->textField($model,'operatorId'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->