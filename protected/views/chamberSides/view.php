<?php
/* @var $this PartsController */
/* @var $model Parts */
?>

<h1>View Side <?php echo $model->sideId; ?> of Chamber <?php echo $model->chamberType; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'chamberType',
		'sideId',
		'description'
	),
)); ?>
