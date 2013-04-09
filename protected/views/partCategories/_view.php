<?php
/* @var $this PartCategoriesController */
/* @var $data PartCategories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('partCatId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->partCatId), array('view', 'id'=>$data->partCatId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />


</div>