<?php
/* @var $this ExperimentSetupController */
/* @var $model ExperimentSetup */

$this->breadcrumbs=array(
	'Experiment Setups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExperimentSetup', 'url'=>array('index')),
	array('label'=>'Manage ExperimentSetup', 'url'=>array('admin')),
);
?>

<h1>Create Experiment Setup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>