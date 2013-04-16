<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

$this->breadcrumbs=array(
	'Experiments'=>array('index'),
	$model->name=>array('view','id'=>$model->experimentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Experiments', 'url'=>array('index')),
	array('label'=>'Create Experiments', 'url'=>array('create')),
	array('label'=>'View Experiments', 'url'=>array('view', 'id'=>$model->experimentId)),
	array('label'=>'Manage Experiments', 'url'=>array('admin')),
);
?>

<h1>Update Experiments <?php echo $model->experimentId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>