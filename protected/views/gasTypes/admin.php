<?php
/* @var $this GasTypesController */
/* @var $model GasTypes */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gas-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gas Types</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gas-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'gasTypeId',
		'name',
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
