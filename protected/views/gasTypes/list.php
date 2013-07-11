<?php
/* @var $this GasTypesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$dataProvider->pagination->pageSize=5;
?>

<h1>Gas Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template'=>'{summary} {pager} <br /> {items} {pager}'
)); ?>
