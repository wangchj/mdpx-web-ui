<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experiments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'experimentId'); ?>
		<?php echo $form->textField($model,'experimentId'); ?>
		<?php echo $form->error($model,'experimentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<!-- div class="row">
		<?php echo $form->labelEx($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
		<?php echo $form->error($model,'dateTime'); ?>
	</div -->

	<div class="row">
		<?php echo $form->labelEx($model,'researcherId'); ?>
		<?php echo $form->dropDownList($model, 'researcherId', Users::getDropdownList()) ?>
		<?php echo $form->error($model,'researcherId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operatorId'); ?>
        <?php echo $form->dropDownList($model, 'operatorId', Users::getDropdownList()) ?>
		<?php echo $form->error($model,'operatorId'); ?>
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
            window.location = "<?php echo $this->createAbsoluteUrl('Experiments/') ?>";
        });
    });
</script>