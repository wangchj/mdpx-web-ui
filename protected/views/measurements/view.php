<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */

$this->breadcrumbs=array(
	'Measurements'=>array('index'),
	$model->measurementId,
);

$this->menu=array(
	array('label'=>'List Measurements', 'url'=>array('index')),
	array('label'=>'Create Measurements', 'url'=>array('create')),
	array('label'=>'Update Measurements', 'url'=>array('update', 'id'=>$model->measurementId)),
	array('label'=>'Delete Measurements', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->measurementId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Measurements', 'url'=>array('admin')),
);
?>

<h1>View Measurements #<?php echo $model->measurementId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'measurementId',
		'experimentSetupId',
		'dateTime',
		'dcVoltage',
		'dcCurrent',
		'rfPower',
		'massFlow',
		'pressure',
		'magnet1',
		'magnet2',
		'magnet3',
		'magnet4',
		'magneticField',
		'magneticFieldGradient',
		'dataPath',
	),
)); ?>
