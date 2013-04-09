<?php
/* @var $this GasTypesController */
/* @var $model GasTypes */

$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GasTypes', 'url'=>array('index')),
	array('label'=>'Manage GasTypes', 'url'=>array('admin')),
);
?>

<h1>Create GasTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>