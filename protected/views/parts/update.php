<?php
/* @var $this PartsController */
/* @var $model Parts */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->name=>array('view','id'=>$model->serialNum),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parts', 'url'=>array('index')),
	array('label'=>'Create Parts', 'url'=>array('create')),
	array('label'=>'View Parts', 'url'=>array('view', 'id'=>$model->serialNum)),
	array('label'=>'Manage Parts', 'url'=>array('admin')),
);
?>

<h1>Update Parts <?php echo $model->serialNum; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tree'=>$tree)); ?>