<?php
/* @var $this PartCategoriesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$dataProvider->pagination->pageSize=3;
?>
<h1>Part Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    //'pager'=>array('pageSize'=>5),
    'template'=>'{summary} {pager} <br /> {items} {pager}'
)); ?>
