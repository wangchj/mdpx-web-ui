<?php
/* @var $this GasTypesController */
/* @var $model GasTypes */

$this->breadcrumbs=array(
	'Gas Types'=>array('index'),
	$model->name=>array('view','id'=>$model->gasTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List GasTypes', 'url'=>array('index')),
	array('label'=>'Create GasTypes', 'url'=>array('create')),
	array('label'=>'View GasTypes', 'url'=>array('view', 'id'=>$model->gasTypeId)),
	array('label'=>'Manage GasTypes', 'url'=>array('admin')),
);
?>

<h1>Update GasTypes <?php echo $model->gasTypeId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>