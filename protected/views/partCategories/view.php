<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */

$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List PartCategories', 'url'=>array('index')),
	array('label'=>'Create PartCategories', 'url'=>array('create')),
	array('label'=>'Update PartCategories', 'url'=>array('update', 'id'=>$model->partCatId)),
	array('label'=>'Delete PartCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->partCatId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PartCategories', 'url'=>array('admin')),
);
?>

<h1>View PartCategories #<?php echo $model->partCatId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'partCatId',
		'name',
		'parent',
	),
)); ?>
