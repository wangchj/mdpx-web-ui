<?php
/* @var $this ExperimentSetupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Experiment Setups',
);

$this->menu=array(
	array('label'=>'Create ExperimentSetups', 'url'=>array('create')),
	array('label'=>'Manage ExperimentSetup', 'url'=>array('admin')),
);
?>

<h1>Experiment Setups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
