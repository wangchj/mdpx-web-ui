<?php
/* @var $this PartsController */
/* @var $model Parts */

$this->breadcrumbs=array(
	'Chambers'=>array('index'),
	$model->sideId,
);

//$this->menu=array(
//	array('label'=>'List Parts', 'url'=>array('index')),
//	array('label'=>'Create Parts', 'url'=>array('create')),
//	array('label'=>'Update Parts', 'url'=>array('update', 'id'=>$model->serialNum)),
//	array('label'=>'Delete Parts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->serialNum),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Parts', 'url'=>array('admin')),
//);
?>

<h1>View Side <?php echo $model->sideId; ?> of Chamber <?php echo $model->chamberType; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'chamberType',
		'sideId',
		'description'
	),
)); ?>
