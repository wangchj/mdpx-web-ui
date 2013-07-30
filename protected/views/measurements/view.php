<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */
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
