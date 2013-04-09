<?php
/* @var $this GasTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gas Types',
);

$this->menu=array(
	array('label'=>'Create GasTypes', 'url'=>array('create')),
	array('label'=>'Manage GasTypes', 'url'=>array('admin')),
);
?>

<h1>Gas Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
