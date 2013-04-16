<?php
/* @var $this ExperimentsController */
/* @var $data Experiments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('experimentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->experimentId), array('view', 'id'=>$data->experimentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTime')); ?>:</b>
	<?php echo CHtml::encode($data->dateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('researcherId')); ?>:</b>
	<?php echo CHtml::encode($data->researcherId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operatorId')); ?>:</b>
	<?php echo CHtml::encode($data->operatorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setupId')); ?>:</b>
	<?php echo CHtml::encode($data->setupId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ExpDataPath')); ?>:</b>
	<?php echo CHtml::encode($data->ExpDataPath); ?>
	<br />

	*/ ?>

</div>