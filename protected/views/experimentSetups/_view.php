<?php
/* @var $this ExperimentSetupsController */
/* @var $data ExperimentSetups */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('experimentSetupId')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->experimentSetupId), array('view', 'id'=>$data->experimentSetupId)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('experimentId')); ?>:</b>
    <?php echo CHtml::encode($data->experimentId); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('dateTime')); ?>:</b>
    <?php echo CHtml::encode($data->dateTime); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vesselSetupId')); ?>:</b>
	<?php echo CHtml::encode($data->vesselSetupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dcVoltageSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->dcVoltageSetpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dcCurrentSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->dcCurrentSetpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfPowerSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->rfPowerSetpoint); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pressureSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->pressureSetpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet1Setpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magnet1Setpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet2Setpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magnet2Setpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet3Setpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magnet3Setpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet4Setpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magnet4Setpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magneticFieldSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magneticFieldSetpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magneticFieldGradientSetpoint')); ?>:</b>
	<?php echo CHtml::encode($data->magneticFieldGradientSetpoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gasType1')); ?>:</b>
	<?php echo CHtml::encode($data->gasType1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gasType2')); ?>:</b>
	<?php echo CHtml::encode($data->gasType2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dustType1')); ?>:</b>
	<?php echo CHtml::encode($data->dustType1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dustType2')); ?>:</b>
	<?php echo CHtml::encode($data->dustType2); ?>
	<br />

	*/ ?>

</div>