<?php
/* @var $this PartsController */
/* @var $model Parts */

$this->breadcrumbs=array(
	'Parts'=>array('index'),
	//'Manage',
);

$this->menu=array(
	array('label'=>'List Parts', 'url'=>array('index')),
	array('label'=>'Create Parts', 'url'=>array('create')),
);

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
	'id'=>'parts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'serialNum',
		//'name',
		array(
            'name'=>'type',
            'value'=>'$data->type0->name  . \' (\' . $data->type . \')\''
            ),
		//'description',
		'addedOn',
        array(
            'name'=>'addedBy',
            'value'=>'$data->addedBy0->firstName . \' \' . $data->addedBy0->lastName . \' (\' . $data->addedBy . \')\''
        ),
		//'addedBy',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
