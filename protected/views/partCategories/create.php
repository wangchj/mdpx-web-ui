<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */

$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PartCategories', 'url'=>array('index')),
	array('label'=>'Manage PartCategories', 'url'=>array('admin')),
);
?>

<h1>New Part Category</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>