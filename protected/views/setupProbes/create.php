<?php
/* @var $this VesselPlatesController */
/* @var $model VesselPlates */

$this->breadcrumbs=array(
	'Vessel Plates'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List VesselSetup', 'url'=>array('index')),
//	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
//);
?>

<h1>Create Vessel Plate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>