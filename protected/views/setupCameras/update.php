<?php
/* @var $this VesselPlatesController */
/* @var $model VesselPlates */

$this->breadcrumbs=array(
	'Vessel Plates'=>array('index'),
	$model->name=>array('view','id'=>$model->vesselSetupId),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List VesselSetup', 'url'=>array('index')),
//	array('label'=>'Create VesselSetup', 'url'=>array('create')),
//	array('label'=>'View VesselSetup', 'url'=>array('view', 'id'=>$model->vesselSetupId)),
//	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
//);
?>

<h1>Update Vessel Plate <?php echo $model->vesselSetupId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>