<?php
/* @var $this ExperimentSetupsController */
/* @var $model ExperimentSetups */

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

$this->menu = array(
    array(
        array('label'=>'Grid View', 'route'=>'experimentSetups/index'),
        array('label'=>'Add New', 'route'=>'experimentSetups/create')
    ),
);
?>

<h1>Manage Experiment Setups</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'experiment-setups-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
    //    'experimentSetupId::ID',
        'experimentId::Group',
        'dateTime:datetime',
		'name',
		'description',
		array('name'=>'vesselSetupNameSearch', 'header'=>'Vessel Setup', 'value'=>'$data->vesselSetup->name'),
		array(
            'name'=>'dcVoltageSetpoint',
            'value'=>'round($data->dcVoltageSetpoint,2)'
        ),
        array(
            'name'=>'dcCurrentSetpoint',
            'value'=>'round($data->dcCurrentSetpoint,2)'
        ),
        array(
            'name'=>'rfPowerSetpoint',
            'value'=>'round($data->rfPowerSetpoint,2)'
        ),
        array(
            'name'=>'pressureSetpoint',
            'value'=>'round($data->pressureSetpoint,2)'
        ),
        /*array(
            'name'=>'magnet1Setpoint',
            'value'=>'round($data->magnet1Setpoint,2)'
        ),
        array(
            'name'=>'magnet2Setpoint',
            'value'=>'round($data->magnet2Setpoint,2)'
        ),
        array(
            'name'=>'magnet3Setpoint',
            'value'=>'round($data->magnet3Setpoint,2)'
        ),
        array(
            'name'=>'magnet4Setpoint',
            'value'=>'round($data->magnet4Setpoint,2)'
        ),*/
		//'magneticFieldSetpoint',
		//'magneticFieldGradientSetpoint',
		//'gasType1',
		//'gasType2',
		//'dustType1',
		//'dustType2',
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'Yii::app()->controller->hasAccess("view")'),
                'update'=>array('visible'=>'Yii::app()->controller->hasAccess("update")'),
                'delete'=>array('visible'=>'Yii::app()->controller->hasAccess("delete")'),
            ),
		),
	),
)); ?>
