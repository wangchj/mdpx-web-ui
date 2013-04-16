<?php
/* @var $this ExperimentSetupController */
/* @var $model ExperimentSetup */

$this->breadcrumbs=array(
	'Experiment Setups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ExperimentSetup', 'url'=>array('index')),
	array('label'=>'Create ExperimentSetup', 'url'=>array('create')),
	array('label'=>'Update ExperimentSetup', 'url'=>array('update', 'id'=>$model->setupId)),
	array('label'=>'Delete ExperimentSetup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->setupId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ExperimentSetup', 'url'=>array('admin')),
);
?>

<h1>View ExperimentSetup #<?php echo $model->setupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'setupId',
		'name',
		'description',
		'vesselSetupId',
		'dcVoltageSetpoint',
		'dcCurrentSetpoint',
		'rfPowerSetpoint',
		'pressureSetpoint',
		'magnet1Setpoint',
		'magnet2Setpoint',
		'magnet3Setpoint',
		'magnet4Setpoint',
		'magneticFieldSetpoint',
		'magneticFieldGradientSetpoint',
		'gasType1',
		'gasType2',
		'dustType1',
		'dustType2',
	),
)); ?>
