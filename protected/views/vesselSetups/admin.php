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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vessel-setups-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'vesselSetupId:number:ID',
        'dateTime:datetime:Create Time',
        'name:text:Setup Name',
        'chamber::Chamber',
		'topElectrode::Upper Electrode',
		'botElectrode::Lower Electrode',
        'pump::Pump',
		array(
            //'header'=>'Actions',
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'Yii::app()->controller->hasAccess("view")'),
                'update'=>array('visible'=>'Yii::app()->controller->hasAccess("update")'),
                'delete'=>array('visible'=>'Yii::app()->controller->hasAccess("delete")'),
            ),
		),
	)
)); ?>
