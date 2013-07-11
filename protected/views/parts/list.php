<?php
/* @var $this PartsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$dataProvider->pagination->pageSize=4;
?>

<h1>Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template'=>'{summary} {pager} <br /> {items} {pager}'
)); ?>
