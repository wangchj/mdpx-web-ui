<?php
/* @var $this PartCategoriesController */
/* @var $model PartCategories */
?>

<h1>View PartCategories #<?php echo $model->partCatId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'partCatId',
		'name',
        'description',
		'parent',
	),
)); ?>
