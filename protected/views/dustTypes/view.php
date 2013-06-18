<?php
/* @var $this DustTypesController */
/* @var $model DustTypes */

$this->breadcrumbs=array(
	'Dust Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DustTypes', 'url'=>array('index')),
	array('label'=>'Create DustTypes', 'url'=>array('create')),
	array('label'=>'Update DustTypes', 'url'=>array('update', 'id'=>$model->dustTypeId)),
	array('label'=>'Delete DustTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->dustTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DustTypes', 'url'=>array('admin')),
);
?>

<h1>View DustTypes #<?php echo $model->dustTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dustTypeId',
		'name',
		//'description',
	),
)); ?>
