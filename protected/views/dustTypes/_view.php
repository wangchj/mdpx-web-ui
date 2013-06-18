<?php
/* @var $this DustTypesController */
/* @var $data DustTypes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dustTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dustTypeId), array('view', 'id'=>$data->dustTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>