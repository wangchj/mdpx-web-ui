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

<p>
<button id="addExperimentBtn" class="btn" type="button"><i class="icon-plus"></i> Create Experiment Setup</button>
</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
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
		'magneticFieldSetpoint',
		'magneticFieldGradientSetpoint',
		'gasType1',
		'gasType2',
		'dustType1',
		'dustType2',
	),
)); ?>

<script type="text/javascript">
    $(function(){
        $('#addExperimentBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('Experiments/create', array('experimentSetupId'=>$model->experimentSetupId))?>";
        });
    });
</script>