<?php
/* @var $this VesselPlatesController */
/* @var $data VesselPlates */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vesselSetupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vesselSetupId), array('view', 'id'=>$data->vesselSetupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('chamber')); ?>:</b>
    <?php echo CHtml::encode($data->chamber); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upperElectrode')); ?>:</b>
	<?php echo CHtml::encode($data->upperElectrode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lowerElectrode')); ?>:</b>
	<?php echo CHtml::encode($data->lowerElectrode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roughPump')); ?>:</b>
	<?php echo CHtml::encode($data->roughPump); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turboPump')); ?>:</b>
	<?php echo CHtml::encode($data->turboPump); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('massFlowController')); ?>:</b>
	<?php echo CHtml::encode($data->massFlowController); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pressureGauge')); ?>:</b>
	<?php echo CHtml::encode($data->pressureGauge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dustShaker')); ?>:</b>
	<?php echo CHtml::encode($data->dustShaker); ?>
	<br />

	*/ ?>

</div>