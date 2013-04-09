<?php
/* @var $this VesselSetupController */
/* @var $model VesselSetup */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List VesselSetup', 'url'=>array('index')),
	array('label'=>'Create VesselSetup', 'url'=>array('create')),
	array('label'=>'Update VesselSetup', 'url'=>array('update', 'id'=>$model->vesselSetupId)),
	array('label'=>'Delete VesselSetup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vesselSetupId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
);
?>

<h1>View VesselSetup #<?php echo $model->vesselSetupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vesselSetupId',
		'name',
		'description',
		array(
            'name'=>'upperElectrode',
            'value'=>$model->upperElectrode0->name . " ($model->upperElectrode)"
        ),
        array(
            'name'=>'lowerElectrode',
            'value'=>$model->upperElectrode0->name . " ($model->upperElectrode)"
        ),
        array(
            'name'=>'roughPump',
            'value'=>$model->roughPump0->name . " ($model->roughPump)"
        ),
        array(
            'name'=>'turboPump',
            'value'=>$model->turboPump0->name . " ($model->turboPump)"
        ),
        array(
            'name'=>'massFlowController',
            'value'=>$model->massFlowController0->name . " ($model->massFlowController)"
        ),
        array(
            'name'=>'pressureGauge',
            'value'=>$model->pressureGauge0->name . " ($model->pressureGauge)"
        ),
        array(
            'name'=>'dustShaker',
            'value'=>$model->dustShaker0->name . " ($model->dustShaker)"
        ),
	),
)); ?>
