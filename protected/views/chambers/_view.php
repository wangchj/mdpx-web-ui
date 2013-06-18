<?php
/* @var $this ChambersController */
/* @var $data Chambers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('serialNum')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->serialNum), array('view', 'id'=>$data->serialNum)); ?>
	<br />

    <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
    -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

    <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
    -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('addedOn')); ?>:</b>
	<?php echo CHtml::encode($data->addedOn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addedBy')); ?>:</b>
	<?php echo CHtml::encode($data->addedBy); ?>
	<br />


</div>