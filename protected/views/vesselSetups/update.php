<?php
/* @var $this VesselSetupsController */
/* @var $model VesselSetups */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	$model->name=>array('view','id'=>$model->vesselSetupId),
	'Update',
);

$this->menu=array(
	array('label'=>'List VesselSetups', 'url'=>array('index')),
	array('label'=>'Create VesselSetup', 'url'=>array('create')),
	array('label'=>'View VesselSetup', 'url'=>array('view', 'id'=>$model->vesselSetupId)),
	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
);
?>

<h1>Update VesselSetup <?php echo $model->vesselSetupId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>