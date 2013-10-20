<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

$this->menu = array(
    array(
        array('label'=>'Detail View', 'route'=>'experiments/view', 'params'=>array('id'=>$this->actionParams['id'])),
        array('label'=>'Parameter Sets', 'route'=>'experimentSetups/index', 'params'=>array('experimentId'=>$this->actionParams['id']))
    ),
    array(
        array('label'=>'Create Param Setup', 'route'=>'experimentSetups/create', 'params'=>array('experimentId'=>$model->experimentId)),
    )
);
?>

<h1>View Experiments #<?php echo $model->experimentId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'experimentId',
		'name',
		'description',
		'dateTime',
        'isProgrammed:boolean',
		array('label'=>'Researcher', 'value'=>"{$model->researcher->firstName} {$model->researcher->lastName}"),
        array('label'=>'Operator', 'value'=>"{$model->operator->firstName} {$model->operator->lastName}"),
	),
)); ?>
