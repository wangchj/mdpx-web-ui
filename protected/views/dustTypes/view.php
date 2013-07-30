<?php
/* @var $this DustTypesController */
/* @var $model DustTypes */
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
