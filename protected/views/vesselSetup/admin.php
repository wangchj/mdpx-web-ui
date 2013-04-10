<?php
/* @var $this VesselSetupController */
/* @var $model VesselSetup */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VesselSetup', 'url'=>array('index')),
	array('label'=>'Create VesselSetup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vessel-setup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vessel Setups</h1>

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
	'id'=>'vessel-setup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vesselSetupId',
		'name',
		'description',
        //'chamber',
        array(
            'name'=>'chamber',
            'value'=>'$data->chamber0->name . " (" . $data->chamber . ")"'
        ),
		array(
            'name'=>'upperElectrode',
            'value'=>'$data->upperElectrode0->name . " (" . $data->upperElectrode . ")"'
        ),
		array(
            'name'=>'lowerElectrode',
            'value'=>'$data->lowerElectrode0->name . " (" . $data->lowerElectrode . ")"'
        ),
		array(
            'name'=>'roughPump',
            'value'=>'$data->roughPump0->name . " (" . $data->roughPump . ")"'
        ),
		array(
            'name'=>'turboPump',
            'value'=>'$data->turboPump0->name . " (" . $data->turboPump . ")"'
        ),
		array(
            'name'=>'massFlowController',
            'value'=>'$data->massFlowController0->name . " (" . $data->massFlowController . ")"'
        ),
        array(
            'name'=>'pressureGauge',
            'value'=>'$data->pressureGauge0->name . " (" . $data->pressureGauge . ")"'
        ),
        array(
            'name'=>'dustShaker',
            'value'=>'$data->dustShaker0->name . " (" . $data->dustShaker . ")"'
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
