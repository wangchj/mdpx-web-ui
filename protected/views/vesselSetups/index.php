<?php
/* @var $this VesselSetupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vessel Setups',
);

$this->menu=array(
	array('label'=>'Create VesselSetup', 'url'=>array('create')),
	array('label'=>'Manage VesselSetups', 'url'=>array('admin')),
);
?>

<h1>Vessel Setups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
