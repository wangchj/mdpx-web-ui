<?php
/* @var $this MeasurementsController */
/* @var $model Measurements */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#measurements-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->menu = array(
    array(
        array('label'=>'Grid View', 'route'=>'measurements/index'),
        array('label'=>'Add New', 'route'=>'measurements/create')
    ),
);
?>

<h1>Manage Measurements</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'measurements-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'measurementId::ID',
		'experimentSetupId::Param Set',
		'dateTime',
        array(
            'name'=>'dcVoltage',
            'header'=>'DC Voltage',
            'value'=>'round($data->dcVoltage,2)'
        ),
        array(
            'name'=>'dcCurrent',
            'header'=>'DC Current',
            'value'=>'round($data->dcCurrent,2)'
        ),
        array(
            'name'=>'rfPower',
            'header'=>'RF Power',
            'value'=>'round($data->rfPower,2)'
        ),
        array(
            'name'=>'massFlow',
            'value'=>'round($data->massFlow,2)'
        ),
        array(
            'name'=>'pressure',
            'value'=>'round($data->pressure,2)'
        ),
        /*array(
            'name'=>'magnet1',
            'value'=>'round($data->magnet1,2)'
        ),
        array(
            'name'=>'magnet2',
            'value'=>'round($data->magnet2,2)'
        ),
        array(
            'name'=>'magnet3',
            'value'=>'round($data->magnet3,2)'
        ),
        array(
            'name'=>'magnet4',
            'value'=>'round($data->magnet4,2)'
        ),*/
        array(
            'name'=>'magneticField',
            'value'=>'round($data->magneticField,2)'
        ),
        array(
            'name'=>'magneticFieldGradient',
            'value'=>'round($data->magneticFieldGradient,2)'
        ),
		/*'dataPath',*/
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
