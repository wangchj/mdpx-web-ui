<?php
/* @var $this RolesController */
/* @var $data Roles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roleId), array('view', 'id'=>$data->roleId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleName')); ?>:</b>
	<?php echo CHtml::encode($data->roleName); ?>
	<br />


</div>