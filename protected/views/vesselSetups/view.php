<?php
/* @var $this VesselSetupsController */
/* @var $model VesselSetups */
?>

<h1>View VesselSetup #<?php echo $model->vesselSetupId; ?></h1>

<p>
    <button id="addPlateBtn" class="btn" type="button"><i class="icon-plus"></i> Add a plate</button>
    <button id="addCameraBtn" class="btn" type="button"><i class="icon-plus"></i> Add a camera</button>
    <button id="addProbeBtn" class="btn" type="button"><i class="icon-plus"></i> Add a probe</button>
    &nbsp;
    <button id="addExperimentSetupBtn" class="btn" type="button"><i class="icon-plus"></i> Create Experiment Setup</button>
</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vesselSetupId',
		'name',
        'dateTime'
	),
)); ?>


<!-- h2>Cameras</h2 -->

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'setup-cameras-grid',
    'dataProvider'=>$cameras->search(),
    'filter'=>$cameras,
    'columns'=>array(
        'setupPartId',
        //'vesselSetupId',
        //'side',
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
));*/ ?>

<!-- h2>Probes</h2 -->

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
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
)); */ ?>

<script type="text/javascript">
    $(function(){
        $('#addCameraBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('SetupCameras/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });
        $('#addProbeBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('SetupProbes/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });
        $('#addExperimentSetupBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('ExperimentSetups/create', array('vesselSetupId'=>$model->vesselSetupId))?>";
        });

    });
</script>
