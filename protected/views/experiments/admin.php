<?php
/* @var $this ExperimentsController */
/* @var $model Experiments */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#experiments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Experiment Groups</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'experiments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'experimentId:number:ID',
		'name',
		'description',
		'dateTime',
        'isProgrammed:boolean',
        array(
            'name'=>'researcherSearch',
            'header'=>'Researcher',
            'value'=>'$data->researcher->firstName . \' \' . $data->researcher->lastName . \' (\' . $data->researcherId . \')\''),
        array(
            'name'=>'operatorSearch',
            'header'=>'Operator',
            'value'=>'$data->operator->firstName . \' \' . $data->operator->lastName . \' (\' . $data->operatorId . \')\''),
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'Yii::app()->controller->hasAccess("view")'),
                'update'=>array('visible'=>'Yii::app()->controller->hasAccess("update")'),
                'delete'=>array('visible'=>'Yii::app()->controller->hasAccess("delete")'),
            ),
		),
	),
)); ?>
