<?php
/* @var $this SetupPartsController */
/* @var $model SetupParts */
?>

<h1>View Setup Part #<?php echo $model->setupPartId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('label'=>'Setup Part Seq', 'name'=>'setupPartId'),
        array('label'=>'Vessel Setup', 'value'=>$model->vesselSetup->name . ' (#' . $model->vesselSetupId . ')'),
		array('label'=>'Part Name', 'value'=>$model->part0->type0->name . ' (' . $model->part0->serialNum . ')'),
        array('label'=>'Relative Location', 'name'=>'port'),
		'parent',
	),
)); ?>
