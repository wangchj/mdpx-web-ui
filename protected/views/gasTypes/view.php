<?php
/* @var $this GasTypesController */
/* @var $model GasTypes */

$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GasTypes', 'url'=>array('index')),
	array('label'=>'Create GasTypes', 'url'=>array('create')),
	array('label'=>'Update GasTypes', 'url'=>array('update', 'id'=>$model->gasTypeId)),
	array('label'=>'Delete GasTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gasTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GasTypes', 'url'=>array('admin')),
);
?>

<h1>View GasTypes #<?php echo $model->gasTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gasTypeId',
		'name',
	),
)); ?>
