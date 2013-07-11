<?php
/* @var $this DustTypesController */
/* @var $data DustTypes */
?>

<?php /*
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('dustTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->dustTypeId), array('view', 'id'=>$data->dustTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>
*/?>

<table class="table table-bordered table-striped" style="margin-bottom: 20px">
    <tr>
        <th style="width:160px"><?php echo CHtml::encode($data->getAttributeLabel('dustTypeId')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->dustTypeId), array('view', 'id'=>$data->dustTypeId)); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
        <td><?php echo CHtml::encode($data->name); ?></td>
    </tr>
    <tr>
</table>