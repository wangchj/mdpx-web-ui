<?php
/* @var $this PartsController */
/* @var $model Parts */

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
?>

<h1>Parts</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'parts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'serialNum',
		array(
            'name'=>'typeSearch',
            'header'=>'Name',
            'value'=>'$data->type0->name  . \' (\' . $data->type . \')\''
        ),
		//'description',
		'addedOn',
        array(
            'name'=>'addedBySearch',
            'header'=>'Added By',
            'value'=>'$data->addedBy0->firstName . \' \' . $data->addedBy0->lastName . \' (\' . $data->addedBy . \')\''
        ),
		array(
			'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'Yii::app()->controller->hasAccess("view")'),
                'update'=>array('visible'=>'false'),
                'delete'=>array('visible'=>'Yii::app()->controller->hasAccess("delete")'),
            ),
		),
	),
)); ?>
