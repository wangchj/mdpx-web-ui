<?php
/* @var $this DustTypesController */
/* @var $model DustTypes */

$this->breadcrumbs=array(
	'Dust Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DustTypes', 'url'=>array('index')),
	array('label'=>'Manage DustTypes', 'url'=>array('admin')),
);
?>

<h1>Create DustTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>