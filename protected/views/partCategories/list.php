<?php
/* @var $this PartCategoriesController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Part Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
