<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */
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
