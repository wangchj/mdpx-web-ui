<?php
/* @var $this PartCategoriesController */
/* @var $dataProvider CActiveDataProvider */

//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/jquery/jquery-ui.custom.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/dist/jquery.dynatree-1.2.4.js');

//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/src/skin-vista/ui.dynatree.css');

//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.contextMenu.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.ui.position.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/screen.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/prettify/prettify.js');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.contextMenu.css');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/screen.css');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/prettify/prettify.sunburst.css');

//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/menu/jquery.contextMenu-custom.js');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/menu/jquery.contextMenu.css');

$this->breadcrumbs=array(
	'Part Categories',
);

$this->menu=array(
	array('label'=>'Create PartCategories', 'url'=>array('create')),
	array('label'=>'Manage PartCategories', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#part-categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Part Categories</h1>

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
    'id'=>'part-categories-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'partCatId',
        'name',
        'parent',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
