<?php
/* @var $this ExperimentSetupsController */
/* @var $model ExperimentSetups */

$this->breadcrumbs=array(
	'Experiment Setups'=>array('index'),
	$model->name=>array('view','id'=>$model->experimentSetupId),
	'Update',
);

$this->menu=array(
	array('label'=>'List ExperimentSetup', 'url'=>array('index')),
	array('label'=>'Create ExperimentSetup', 'url'=>array('create')),
	array('label'=>'View ExperimentSetup', 'url'=>array('view', 'id'=>$model->experimentSetupId)),
	array('label'=>'Manage ExperimentSetup', 'url'=>array('admin')),
);
?>

<h1>Update ExperimentSetup <?php echo $model->experimentSetupId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>