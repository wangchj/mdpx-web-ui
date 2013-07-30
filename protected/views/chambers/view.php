<?php
/* @var $this ChambersController */
/* @var $model Chambers */
?>

<h1>View Chamber #<?php echo $model->serialNum; ?></h1>

<p>
<button id="addSideBtn" class="btn" type="button"><i class="icon-plus"></i> Add a side</button>
</p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'serialNum',
		//'name',
		array(
            'name'=>'type',
            'value'=>$model->type0->name . " ($model->type)"
        ),
		//'description',
		'addedOn',
        array(
            'name'=>'addedBy',
            'value'=>$model->addedBy0->firstName . ' ' . $model->addedBy0->lastName . " ($model->addedBy)"
        ),
	),
)); ?>

<br />

<!-- h2>Chamber Sides</h2 -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'sides-grid',
    'dataProvider'=>$sides->search(),
    'filter'=>$sides,
    'columns'=>array(
        array(
            'name'=>'chamberType',
            'value'=>'$data->chamberType0->name  . \' (\' . $data->chamberType . \')\''
        ),
        'sideId',
        'description',
        array(
            'class'=>'CButtonColumn',
            'viewButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/view", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/delete", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/update", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            //'buttons'=>array('delete'=>array('visible'=>'false'))
        ),
    ),
)); ?>

<script type="text/javascript">
    $(function(){
        $('#addSideBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('chamberSides/create', array('chamberType'=>$model->type))?>";
        });

    });
</script>
