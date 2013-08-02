<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

$this->menu = array(
  array(
      array('label'=>'Grid View', 'route'=>'experiments/index'),
      array('label'=>'Add New', 'route'=>'experiments/create')
  ),
  array(
      array('label'=>'Detail View', 'route'=>'experiments/view', 'params'=>array('id'=>$this->actionParams['id'])),
      array('label'=>'Parameter Sets', 'route'=>'experimentSetups/index', 'params'=>array('experimentId'=>$this->actionParams['id']))
  ),
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
		'researcherId',
		'operatorId',
	),
)); ?>
