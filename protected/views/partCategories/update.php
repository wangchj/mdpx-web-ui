<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */

$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->partCatId),
	'Update',
);

$this->menu=array(
	array('label'=>'List PartCategories', 'url'=>array('index')),
	array('label'=>'Create PartCategories', 'url'=>array('create')),
	array('label'=>'View PartCategories', 'url'=>array('view', 'id'=>$model->partCatId)),
	array('label'=>'Manage PartCategories', 'url'=>array('admin')),
);
?>

<h1>Update PartCategories <?php echo $model->partCatId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>