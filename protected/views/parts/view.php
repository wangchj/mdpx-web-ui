<?php
/* @var $this PartsController */
/* @var $model Parts */
?>

<h1>View Parts #<?php echo $model->serialNum; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'serialNum',
		//'name',
		array(
            'name'=>'type',
            'value'=>$model->type0->name . " ($model->type)"
        ),
		//'description',
		'addedOn',
        array(
            'name'=>'addedBy',
            'value'=>$model->addedBy0->firstName . ' ' . $model->addedBy0->lastName . " ($model->addedBy)"
        ),
	),
)); ?>
