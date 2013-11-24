<?php
/* @var $this SetupPartsController */
/* @var $model SetupParts */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#setup-parts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->menu = array(
    array(array('label'=>'Grid View', 'route'=>'index'))
);
?>

<h1>Setup Parts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setup-parts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'setupPartId',
		'vesselSetupId',
		array('name'=>'partNameSearch', 'value'=>'$data->part0->type0->name'),
        array('name'=>'serialNumSearch', 'value'=>'$data->part0->serialNum'),
        'port',
        'parent',
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
