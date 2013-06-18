<?php
/* @var $this VesselSetupsController */
/* @var $model VesselSetups */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VesselSetups', 'url'=>array('index')),
	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
);
?>

<h1>Create VesselSetup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>