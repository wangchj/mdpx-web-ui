<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

$this->breadcrumbs=array(
	'Experiments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Experiments', 'url'=>array('index')),
	array('label'=>'Manage Experiments', 'url'=>array('admin')),
);
?>

<h1>Create Experiments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>