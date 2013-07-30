<?php
/* @var $this GasTypesController */
/* @var $model GasTypes */
?>

<h1>View GasTypes #<?php echo $model->gasTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gasTypeId',
		'name',
	),
)); ?>
