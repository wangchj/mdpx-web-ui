<?php
/* @var $this ExperimentSetupsController */
/* @var $model ExperimentSetups */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'experiment-setups-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div>
        <?php echo $form->labelEx($model,'experimentId'); ?>
        <?php echo $form->dropDownList($model,'experimentId', Experiments::getDropdownList()); ?>
        <?php echo $form->error($model,'experimentId'); ?>
    </div>

    <? /*<div>
        <?php echo $form->labelEx($model,'dateTime'); ?>
        <?php echo $form->textField($model,'dateTime'); ?>
        <?php echo $form->error($model,'dateTime'); ?>
    </div>*/?>

	<div>
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'vesselSetupId'); ?>
		<?php echo $form->dropDownList($model,'vesselSetupId', VesselSetups::getDropdownList()); ?>
		<?php echo $form->error($model,'vesselSetupId'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'dcVoltageSetpoint'); ?>
		<?php echo $form->textField($model,'dcVoltageSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcVoltageSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'dcCurrentSetpoint'); ?>
		<?php echo $form->textField($model,'dcCurrentSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'dcCurrentSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'rfPowerSetpoint'); ?>
		<?php echo $form->textField($model,'rfPowerSetpoint',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rfPowerSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'pressureSetpoint'); ?>
		<?php echo $form->textField($model,'pressureSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'pressureSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magnet1Setpoint'); ?>
		<?php echo $form->textField($model,'magnet1Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet1Setpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magnet2Setpoint'); ?>
		<?php echo $form->textField($model,'magnet2Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet2Setpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magnet3Setpoint'); ?>
		<?php echo $form->textField($model,'magnet3Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet3Setpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magnet4Setpoint'); ?>
		<?php echo $form->textField($model,'magnet4Setpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magnet4Setpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magneticFieldSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticFieldSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'magneticFieldGradientSetpoint'); ?>
		<?php echo $form->textField($model,'magneticFieldGradientSetpoint',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'magneticFieldGradientSetpoint'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'gasType1'); ?>
        <?php echo $form->dropDownList($model,'gasType1',GasTypes::getGasTypeDropdownList()); ?>
		<?php echo $form->error($model,'gasType1'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'gasType2'); ?>
        <?php echo $form->dropDownList($model,'gasType2',GasTypes::getGasTypeDropdownList()); ?>
		<?php echo $form->error($model,'gasType2'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'dustType1'); ?>
        <?php echo $form->dropDownList($model,'dustType1',DustTypes::getDustTypeDropdownList()); ?>
		<?php echo $form->error($model,'dustType1'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'dustType2'); ?>
        <?php echo $form->dropDownList($model,'dustType2',DustTypes::getDustTypeDropdownList()); ?>
		<?php echo $form->error($model,'dustType2'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function(){
        $('#cancelBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('ExperimentSetups/index') ?>";
        });
    });
</script>