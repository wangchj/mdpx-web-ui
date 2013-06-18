<?php
/* @var $this ExperimentSetupController */
/* @var $model ExperimentSetup */

$this->breadcrumbs=array(
	'Experiment Setups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ExperimentSetups', 'url'=>array('index')),
	array('label'=>'Create ExperimentSetup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#experiment-setup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Experiment Setups</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'experiment-setups-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'experimentSetupId',
        'experimentId',
        'dateTime',
		'name',
		'description',
		'vesselSetupId',
		'dcVoltageSetpoint',
		'dcCurrentSetpoint',
		'rfPowerSetpoint',
		'pressureSetpoint',
		'magnet1Setpoint',
		'magnet2Setpoint',
		'magnet3Setpoint',
		'magnet4Setpoint',
		//'magneticFieldSetpoint',
		//'magneticFieldGradientSetpoint',
		//'gasType1',
		//'gasType2',
		//'dustType1',
		//'dustType2',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
