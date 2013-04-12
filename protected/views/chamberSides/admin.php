<?php
/* @var $this PartsController */
/* @var $model Parts */

$this->breadcrumbs=array(
	'ChamberSides'=>array('index'),
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
	$('#chambersides-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Chamber Sides</h1>

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
        array(
            'name'=>'chamberType',
            'value'=>'$data->chamberType0->name  . \' (\' . $data->chamberType . \')\''
        ),
		'sideId',
		'description',
        array(
            'class'=>'CButtonColumn',
            'viewButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/view", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/delete", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
            'updateButtonUrl'=>'Yii::app()->createUrl("/ChamberSides/update", array("chamberType" => $data["chamberType"], "sideId"=>$data["sideId"]))',
        ),
	)
)); ?>
