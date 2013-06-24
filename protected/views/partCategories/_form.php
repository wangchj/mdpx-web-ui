<script type="text/javascript">
    $(function(){
        $('#cancelBtn').click(function(){
            window.location = "<?php echo $this->createUrl('PartCategories/')?>";
        });
    });
</script>

<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'part-categories-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div>
        <?php echo $form->labelEx($model,'parent'); ?>
        <?php echo $form->textField($model,'parent'); ?>
        <?php echo $form->error($model,'parent'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'partCatId'); ?>
        <?php echo $form->textField($model,'partCatId'); ?>
        <?php echo $form->error($model,'partCatId'); ?>
    </div>

	<div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('size'=>200,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'isGroup'); ?>
        <?php echo $form->checkbox($model,'isGroup'); ?>
        <?php echo $form->error($model,'isGroup'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::Button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->