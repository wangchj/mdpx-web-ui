<?php
/* @var $this ExperimentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Experiments',
);

$this->menu=array(
	array('label'=>'Create Experiments', 'url'=>array('create')),
	array('label'=>'Manage Experiments', 'url'=>array('admin')),
);
?>

<h1>Experiments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
