<?php
/* @var $this SetupPartsController */
/* @var $model SetupParts */
?>

<h1>View Setup Part #<?php echo $model->setupPartId; ?></h1>

<?php
if($model->isCamera())
{
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            array('label'=>'Setup Part Seq', 'name'=>'setupPartId'),
            array('label'=>'Vessel Setup', 'value'=>$model->vesselSetup->name . ' (#' . $model->vesselSetupId . ')'),
            array('label'=>'Part Name', 'value'=>$model->part0->type0->name . ' (' . $model->part0->serialNum . ')'),
            array('label'=>'Position R', 'value'=>$model->setupCameras != null ? $model->setupCameras->positionR : null),
            array('label'=>'Position Z', 'value'=>$model->setupCameras != null ? $model->setupCameras->positionZ : null),
            array('label'=>'Lens', 'value'=>$model->setupCameras != null ? $model->setupCameras->lens0->type0->name . ' (' . $model->setupCameras->lens . ')' : null),
            array('label'=>'Filter', 'value'=>$model->setupCameras != null ? $model->setupCameras->filter0->type0->name . ' (' . $model->setupCameras->filter . ')' : null),
            array('label'=>'Relative Location', 'name'=>'port'),
            'parent',
        ),
    ));
}
elseif($model->isProbe())
{
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            array('label'=>'Setup Part Seq', 'name'=>'setupPartId'),
            array('label'=>'Vessel Setup', 'value'=>$model->vesselSetup->name . ' (#' . $model->vesselSetupId . ')'),
            array('label'=>'Part Name', 'value'=>$model->part0->type0->name . ' (' . $model->part0->serialNum . ')'),
            array('label'=>'Length', 'value'=>$model->setupProbes != null ? $model->setupProbes->length : null),
            array('label'=>'Width', 'value'=>$model->setupProbes != null ? $model->setupProbes->width : null),
            array('label'=>'Relative Location', 'name'=>'port'),
            'parent',
        ),
    ));
}
else{
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            array('label'=>'Setup Part Seq', 'name'=>'setupPartId'),
            array('label'=>'Vessel Setup', 'value'=>$model->vesselSetup->name . ' (#' . $model->vesselSetupId . ')'),
            array('label'=>'Part Name', 'value'=>$model->part0->type0->name . ' (' . $model->part0->serialNum . ')'),
            array('label'=>'Relative Location', 'name'=>'port'),
            'parent',
        ),
    ));
}
?>
