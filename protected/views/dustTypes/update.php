<?php
/* @var $this DustTypesController */
/* @var $model DustTypes */

$this->breadcrumbs=array(
	'Dust Types'=>array('index'),
	$model->name=>array('view','id'=>$model->dustTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List DustTypes', 'url'=>array('index')),
	array('label'=>'Create DustTypes', 'url'=>array('create')),
	array('label'=>'View DustTypes', 'url'=>array('view', 'id'=>$model->dustTypeId)),
	array('label'=>'Manage DustTypes', 'url'=>array('admin')),
);
?>

<h1>Update DustTypes <?php echo $model->dustTypeId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>