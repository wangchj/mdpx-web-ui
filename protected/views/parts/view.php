<?php
/* @var $this PartsController */
/* @var $model Parts */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Parts', 'url'=>array('index')),
	array('label'=>'Create Parts', 'url'=>array('create')),
	array('label'=>'Update Parts', 'url'=>array('update', 'id'=>$model->serialNum)),
	array('label'=>'Delete Parts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->serialNum),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parts', 'url'=>array('admin')),
);
?>

<h1>View Parts #<?php echo $model->serialNum; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'serialNum',
		'name',
		array(
            'name'=>'type',
            'value'=>$model->type0->name . " ($model->type)"
        ),
		'description',
		'addedOn',
        array(
            'name'=>'addedBy',
            'value'=>$model->addedBy0->firstName . ' ' . $model->addedBy0->lastName . " ($model->addedBy)"
        ),
	),
)); ?>
