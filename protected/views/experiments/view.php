<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

$this->breadcrumbs=array(
	'Experiments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Experiments', 'url'=>array('index')),
	array('label'=>'Create Experiments', 'url'=>array('create')),
	array('label'=>'Update Experiments', 'url'=>array('update', 'id'=>$model->experimentId)),
	array('label'=>'Delete Experiments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->experimentId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Experiments', 'url'=>array('admin')),
);
?>

<h1>View Experiments #<?php echo $model->experimentId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'experimentId',
		'name',
		'description',
		'dateTime',
		'researcherId',
		'operatorId',
	),
)); ?>
