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
	'id'=>'measurements-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'measurementId',
		'experimentSetupId',
		'dateTime',
        array(
            'name'=>'dcVoltage',
            'value'=>'round($data->dcVoltage,2)'
        ),
        array(
            'name'=>'dcCurrent',
            'value'=>'round($data->dcCurrent,2)'
        ),
        array(
            'name'=>'rfPower',
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
        array(
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
        ),
        array(
            'name'=>'magneticField',
            'value'=>'round($data->magneticField,2)'
        ),
        array(
            'name'=>'magneticFieldGradient',
            'value'=>'round($data->magneticFieldGradient,2)'
        ),
		'dataPath',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
