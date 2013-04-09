<?php
/* @var $this DustTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dust Types',
);

$this->menu=array(
	array('label'=>'Create DustTypes', 'url'=>array('create')),
	array('label'=>'Manage DustTypes', 'url'=>array('admin')),
);
?>

<h1>Dust Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
