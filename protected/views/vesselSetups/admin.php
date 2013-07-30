<?php
/* @var $this VesselSetupsController */
/* @var $dataProvider CSqlDataProvider */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vessel-setups-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vessel Setups</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!-- div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div --><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vessel-setups-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$model,
	'columns'=>array(
	//	'vesselSetupId',
	//	'name',
    //    'dateTime',
		//'description',
        //'chamber',
        array(
            'name'=>'vesselSetupId',
            'header'=>'ID'
        ),
        array(
            'name'=>'dateTime',
            'header'=>'Date Time'
        ),
        array(
            'name'=>'name',
            'header'=>'Name'
        ),
        array(
            'name'=>'chamber',
            'header'=>'Chamber'
        ),
		array(
            'name'=>'topElectrode',
            'header'=>'Upper Electrode'
        ),
		array(
            'name'=>'botElectrode',
            'header'=>'Lower Electrode'
        ),
//		array(
//            'name'=>'roughPump',
//            'value'=>'$data->roughPump0->name . " (" . $data->roughPump . ")"'
//        ),
//		array(
//            'name'=>'turboPump',
//            'value'=>'$data->turboPump0->name . " (" . $data->turboPump . ")"'
//        ),
//		array(
//            'name'=>'massFlowController',
//            'value'=>'$data->massFlowController0->name . " (" . $data->massFlowController . ")"'
//        ),
//        array(
//            'name'=>'pressureGauge',
//            'value'=>'$data->pressureGauge0->name . " (" . $data->pressureGauge . ")"'
//        ),
//        array(
//            'name'=>'dustShaker',
//            'value'=>'$data->dustShaker0->name . " (" . $data->dustShaker . ")"'
//        ),
		array(
            'header'=>'Actions',
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->controller->createUrl("partslist", array("id"=>$data["vesselSetupId"]))',
                ),
                'update'=>array('visible'=>'false'),
                'delete'=>array('visible'=>'false'),

            ),
		),
	)
)); ?>
