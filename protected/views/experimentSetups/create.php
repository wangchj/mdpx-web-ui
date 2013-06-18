<?php
/* @var $this ExperimentSetupsController */
/* @var $model ExperimentSetups */

$this->breadcrumbs=array(
	'Experiment Setups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExperimentSetups', 'url'=>array('index')),
	array('label'=>'Manage ExperimentSetup', 'url'=>array('admin')),
);
?>

<h1>Create Experiment Setup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>