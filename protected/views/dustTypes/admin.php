<?php
/* @var $this DustTypesController */
/* @var $model DustTypes */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dust-types-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dust Types</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dust-types-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'dustTypeId',
		'name',
		//'description',
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
