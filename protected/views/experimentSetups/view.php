<?php
/* @var $this ExperimentSetupsController */
/* @var $model ExperimentSetups */

$this->menu = array(
    array(
        array('label'=>'Detail View', 'route'=>'experimentSetups/view', 'params'=>array('id'=>$this->actionParams['id'])),
        array('label'=>'Measurements', 'route'=>'measurements/index', 'params'=>array('experimentSetupId'=>$this->actionParams['id']))
    ),
);

?>

<h1>View Experiment Setup #<?php echo $model->experimentSetupId; ?></h1>
<!--
<p>
<button id="addExperimentBtn" class="btn" type="button"><i class="icon-plus"></i> Create Experiment Setup</button>
</p>
-->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        array('label'=>'Experiment Setup ID', 'name'=>'experimentSetupId'),
        array('label'=>'Experiment Group', 'value'=>"{$model->experiment->name} (Group ID = $model->experimentId)"),
        'dateTime:datetime',
		'name',
		'description',
		array('label'=>'Vessel Setup', 'value'=>"{$model->vesselSetup->name} (Setup ID = $model->vesselSetupId)"),
		array('label'=>'DC Voltage Setpoint (V)', 'name'=>'dcVoltageSetpoint'),
        array('label'=>'DC Current Setpoint (A)', 'name'=>'dcCurrentSetpoint'),
        array('label'=>'RF Power Setuppoint (??)', 'name'=>'rfPowerSetpoint'),
		'pressureSetpoint',
		'magnet1Setpoint',
		'magnet2Setpoint',
		'magnet3Setpoint',
		'magnet4Setpoint',
		'magneticFieldSetpoint',
		'magneticFieldGradientSetpoint',
		array('label'=>'Gas Type 1', 'value'=>"{$model->gasType10->name}"),
        array('label'=>'Gas Type 2', 'value'=>"{$model->gasType20->name}"),
        array('label'=>'Dust Type 2', 'value'=>"{$model->dustType10->name}"),
        array('label'=>'Dust Type 2', 'value'=>"{$model->dustType20->name}"),
	),
)); ?>

<script type="text/javascript">
    $(function(){
        $('#addExperimentBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('Experiments/create', array('experimentSetupId'=>$model->experimentSetupId))?>";
        });
    });
</script>