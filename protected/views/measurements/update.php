<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */

$this->breadcrumbs=array(
	'Measurements'=>array('index'),
	$model->measurementId=>array('view','id'=>$model->measurementId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Measurements', 'url'=>array('index')),
	array('label'=>'Create Measurements', 'url'=>array('create')),
	array('label'=>'View Measurements', 'url'=>array('view', 'id'=>$model->measurementId)),
	array('label'=>'Manage Measurements', 'url'=>array('admin')),
);
?>

<h1>Update Measurements <?php echo $model->measurementId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>