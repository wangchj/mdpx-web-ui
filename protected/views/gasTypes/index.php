<?php
/* @var $this GasTypesController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Gas Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
