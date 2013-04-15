<?php
/* @var $this VesselSetupController */
/* @var $model VesselSetup */

$this->breadcrumbs=array(
	'Vessel Setups'=>array('index'),
	$model->name,
);

//$this->menu=array(
//	array('label'=>'List VesselSetup', 'url'=>array('index')),
//	array('label'=>'Create VesselSetup', 'url'=>array('create')),
//	array('label'=>'Update VesselSetup', 'url'=>array('update', 'id'=>$model->vesselSetupId)),
//	array('label'=>'Delete VesselSetup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vesselSetupId),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage VesselSetup', 'url'=>array('admin')),
//);
?>

<h1>View VesselSetup #<?php echo $model->vesselSetupId; ?></h1>

<p>
    <button id="addPlateBtn" class="btn" type="button"><i class="icon-plus"></i> Add a plate</button>
    <button id="addCameraBtn" class="btn" type="button"><i class="icon-plus"></i> Add a camera</button>
    <button id="addProbeBtn" class="btn" type="button"><i class="icon-plus"></i> Add a probe</button>
</p>

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
                'delete'=>array('visible'=>'false'),
                'update'=>array('visible'=>'false'),
            ),
            //'viewButtonUrl'=>'Yii::app()->createUrl("/VesselSetup/view", array("vesselSetupId" => $data["vesselSetup"], "sideId"=>$data["side"]))',
            //'deleteButtonUrl'=>'Yii::app()->createUrl("/VesselSetup/delete", array("vesselSetupId" => $data["vesselSetup"], "sideId"=>$data["side"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/VesselSetup/update", array("vesselSetupId" => $data["vesselSetupId"], "side"=>$data["side"]))',
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
            window.location = "<?php echo $this->createAbsoluteUrl('VesselPlates/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });
        $('#addCameraBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('SetupCameras/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });
        $('#addProbeBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('SetupProbes/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });

    });
</script>
