<?php
/* @var $this GasTypesController */
/* @var $data GasTypes */
?>

<?php
/*

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gasTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gasTypeId), array('view', 'id'=>$data->gasTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>
*/?>

<table class="table table-bordered table-striped" style="margin-bottom: 20px">
    <tr>
        <th style="width:160px"><?php echo CHtml::encode($data->getAttributeLabel('gasTypeId')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->gasTypeId), array('view', 'id'=>$data->gasTypeId)); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
        <td><?php echo CHtml::encode($data->name); ?></td>
    </tr>
    <tr>
</table>