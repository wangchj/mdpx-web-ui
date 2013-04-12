<?php
/* @var $this ChamberSidesController */
/* @var $model ChamberSides */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chamber-sides-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->label($model,'chamberType'); ?>
        <?php if($model->chamberType0 != null){ ?>
            <?php echo $model->chamberType0->name . " ($model->chamberType)" ?>
        <?php } ?>
        <?php echo $form->error($model,'chamberType'); ?>
    </div>

    <div class="row">
		<?php echo $form->label($model,'sideId'); ?>
		<?php echo $nextLargerSide ?>
		<?php echo $form->error($model,'sideId'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function(){
        $('#cancelBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('chambers/view', array('id'=>$model->chamberType))  ?>";
        });
    });
</script>