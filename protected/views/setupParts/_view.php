<?php
/* @var $this SetupPartsController */
/* @var $data SetupParts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('setupPartId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->setupPartId), array('view', 'id'=>$data->setupPartId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vesselSetupId')); ?>:</b>
	<?php echo CHtml::encode($data->vesselSetupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('part')); ?>:</b>
	<?php echo CHtml::encode($data->part); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port')); ?>:</b>
	<?php echo CHtml::encode($data->port); ?>
	<br />


</div>