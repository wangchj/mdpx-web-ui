<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div>
		<?php echo $form->label($model,'partCatId'); ?>
		<?php echo $form->textField($model,'partCatId'); ?>
	</div>

	<div>
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

    <div>
        <?php echo $form->label($model,'description'); ?>
        <?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>200)); ?>
    </div>

	<div>
		<?php echo $form->label($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->