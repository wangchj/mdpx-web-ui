<?php
/* @var $this VesselSetupController */
/* @var $model VesselSetup */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VesselSetup', 'url'=>array('index')),
	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
);
?>

<h1>Create VesselSetup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>