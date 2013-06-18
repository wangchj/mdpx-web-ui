<?php
/* @var $this MeasurementsController */
/* @var $data Measurements */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('measurementId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->measurementId), array('view', 'id'=>$data->measurementId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('experimentSetupId')); ?>:</b>
	<?php echo CHtml::encode($data->experimentSetupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTime')); ?>:</b>
	<?php echo CHtml::encode($data->dateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dcVoltage')); ?>:</b>
	<?php echo CHtml::encode($data->dcVoltage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dcCurrent')); ?>:</b>
	<?php echo CHtml::encode($data->dcCurrent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rfPower')); ?>:</b>
	<?php echo CHtml::encode($data->rfPower); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('massFlow')); ?>:</b>
	<?php echo CHtml::encode($data->massFlow); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pressure')); ?>:</b>
	<?php echo CHtml::encode($data->pressure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet1')); ?>:</b>
	<?php echo CHtml::encode($data->magnet1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet2')); ?>:</b>
	<?php echo CHtml::encode($data->magnet2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet3')); ?>:</b>
	<?php echo CHtml::encode($data->magnet3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magnet4')); ?>:</b>
	<?php echo CHtml::encode($data->magnet4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magneticField')); ?>:</b>
	<?php echo CHtml::encode($data->magneticField); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('magneticFieldGradient')); ?>:</b>
	<?php echo CHtml::encode($data->magneticFieldGradient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataPath')); ?>:</b>
	<?php echo CHtml::encode($data->dataPath); ?>
	<br />

	*/ ?>

</div>