<?php
/* @var $this GasTypesController */
/* @var $data GasTypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gasTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gasTypeId), array('view', 'id'=>$data->gasTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>