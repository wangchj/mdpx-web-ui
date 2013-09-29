<?php
/* @var $this VesselSetupsController */
/* @var $model SetupParts */

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#parts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
*/

$this->menu = array(
    array(
        array('label'=>'Setup Summary', 'route'=>'view', 'params'=>array('id'=>$model->vesselSetupId)),
        array('label'=>'Parts List', 'route'=>'partsList', 'params'=>array('id'=>$model->vesselSetupId)),
        array('label'=>'Parts Tree', 'route'=>'tree', 'params'=>array('id'=>$model->vesselSetupId)),
    )
);
?>

<h1>Vessel Setup #<?php echo $model->vesselSetupId; ?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'parts-list-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'setupPartId:raw:Setup Part ID',
        'part0.type0.name:text:Part Name',
        'part0.serialNum',
        'parent0.part0.type0.name:text:Parent Part',
		'port:number:Location',
//		'addedOn',
//        array(
//            'name'=>'addedBy',
//            'value'=>'$data->addedBy0->firstName . \' \' . $data->addedBy0->lastName . \' (\' . $data->addedBy . \')\''
//        ),
//		//'addedBy',
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->controller->createUrl("setupParts/view",array("id"=>$data->setupPartId))',
                    'visible'=>'Yii::app()->controller->hasAccess("setupParts", "view")'),
                'update'=>array(
                    'url'=>'Yii::app()->controller->createUrl("setupParts/update",array("id"=>$data->setupPartId,"retUrl"=>Yii::app()->controller->createUrl("vesselSetups/partsList",array("id"=>$data->vesselSetupId))))',
                     'visible'=>'Yii::app()->controller->hasAccess("setupParts", "update")'),
                'delete'=>array(
                    'url'=>'Yii::app()->controller->createUrl("setupParts/delete",array("id"=>$data->setupPartId))',
                    'visible'=>'Yii::app()->controller->hasAccess("setupParts", "delete")'),
            ),
		),
	),
)); ?>
