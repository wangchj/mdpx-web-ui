<?php
/* @var $this VesselPlatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vessel Plates',
);

//$this->menu=array(
//	array('label'=>'Create VesselSetup', 'url'=>array('create')),
//	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
//);
?>

<h1>Vessel Plates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
