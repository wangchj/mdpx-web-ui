<?php
/* @var $this SetupProbesController */
/* @var $model SetupProbes */
?>

<h1>View Setup Probe #<?php echo $model->vesselSetupId; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vesselSetupId',
		'name',
		'description',
        array(
            'name'=>'upperElectrode',
            'value'=>$model->chamber0->name . " ($model->chamber)"
        ),
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

<h2>Plates</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'vessel-plates-grid',
    'dataProvider'=>$plates->search(),
    'filter'=>$plates,
    'columns'=>array(
        'vesselSetupId',
        'side',
        array(
            'name'=>'plate',
            'value'=>'$data->plate0->name . " (" . $data->plate . ")"'
        ),
        array(
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update'=>array('visible'=>'false'),
                'delete'=>array('visible'=>'false')),
            'viewButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/view", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/delete", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/update", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
        ),
    ),
)); ?>

<h2>Cameras</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'setup-cameras-grid',
    'dataProvider'=>$cameras->search(),
    'filter'=>$cameras,
    'columns'=>array(
        'vesselSetupId',
        'side',
        array(
            'name'=>'camera',
            'value'=>'$data->camera0->name . " (" . $data->camera . ")"',
        ),
        'description',
        'positionR',
        'positionZ',
        array(
            'name'=>'lens',
            'value'=>'$data->lens0->name . " (" . $data->lens . ")"',
        ),
        array(
            'name'=>'filter',
            'value'=>'$data->filter0->name . " (" . $data->filter . ")"',
        ),
        array(
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update'=>array('visible'=>'false'),
                'delete'=>array('visible'=>'false')),
            'viewButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/view", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/delete", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/update", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
        ),
    ),
)); ?>

<h2>Probes</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'setup-probes-grid',
    'dataProvider'=>$probes->search(),
    'filter'=>$probes,
    'columns'=>array(
        'vesselSetupId',
        'side',
        array(
            'name'=>'probe',
            'value'=>'$data->probe0->name . " (" . $data->probe . ")"',
        ),
        'length',
        'width',
        array(
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update'=>array('visible'=>'false'),
                'delete'=>array('visible'=>'false')),
            'viewButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/view", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/delete", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/update", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
        ),
    ),
)); ?>

<script type="text/javascript">
    $(function(){
        $('#addPlateBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('chamberSides/create', array('chamberType'=>$model->type))?>";
        });
        $('#addCameraBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('chamberSides/create', array('chamberType'=>$model->type))?>";
        });
        $('#addProbeBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('chamberSides/create', array('chamberType'=>$model->type))?>";
        });

    });
</script>
