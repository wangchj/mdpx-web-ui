<?php
/* @var $this ExperimentSetupController */
/* @var $model ExperimentSetup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experiment-setup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- div class="row">
		<?php echo $form->labelEx($model,'setupId'); ?>
		<?php echo $form->textField($model,'setupId'); ?>
		<?php echo $form->error($model,'setupId'); ?>
	</div -->

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

	<div class="row">
		<?php echo $form->labelEx($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId'); ?>
		<?php echo $form->error($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dcVoltageSetpoint'); ?>
		<?php echo $form->textField($model,'dcVoltageSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcVoltageSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dcCurrentSetpoint'); ?>
		<?php echo $form->textField($model,'dcCurrentSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcCurrentSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rfPowerSetpoint'); ?>
		<?php echo $form->textField($model,'rfPowerSetpoint',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rfPowerSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pressureSetpoint'); ?>
		<?php echo $form->textField($model,'pressureSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'pressureSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet1Setpoint'); ?>
		<?php echo $form->textField($model,'magnet1Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet1Setpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet2Setpoint'); ?>
		<?php echo $form->textField($model,'magnet2Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet2Setpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet3Setpoint'); ?>
		<?php echo $form->textField($model,'magnet3Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet3Setpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magnet4Setpoint'); ?>
		<?php echo $form->textField($model,'magnet4Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet4Setpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magneticFieldSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticFieldSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'magneticFieldGradientSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldGradientSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticFieldGradientSetpoint'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gasType1'); ?>
        <?php echo $form->dropDownList($model,'gasType1',GasTypes::getGasTypeDropdownList()); ?>
		<?php echo $form->error($model,'gasType1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gasType2'); ?>
        <?php echo $form->dropDownList($model,'gasType2',GasTypes::getGasTypeDropdownList()); ?>
		<?php echo $form->error($model,'gasType2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dustType1'); ?>
        <?php echo $form->dropDownList($model,'dustType1',DustTypes::getDustTypeDropdownList()); ?>
		<?php echo $form->error($model,'dustType1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dustType2'); ?>
        <?php echo $form->dropDownList($model,'dustType2',DustTypes::getDustTypeDropdownList()); ?>
		<?php echo $form->error($model,'dustType2'); ?>
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
            window.location = "<?php echo $this->createAbsoluteUrl('ExperimentSetup/index') ?>";
        });
    });
</script>