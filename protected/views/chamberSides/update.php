<?php
/* @var $this ChamberSidesController */
/* @var $model ChamberSides */

$this->breadcrumbs=array(
	'Chamber Sides'=>array('index'),
	//$model->name=>array('view','id'=>$model->serialNum),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List Parts', 'url'=>array('index')),
//	array('label'=>'Create Parts', 'url'=>array('create')),
//	array('label'=>'View Parts', 'url'=>array('view', 'id'=>$model->serialNum)),
//	array('label'=>'Manage Parts', 'url'=>array('admin')),
//);
?>

<h1>Update Side <?php echo $model->sideId; ?> of <?php echo $model->chamberType0->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'nextLargerSide'=>$nextLargerSide)); ?>