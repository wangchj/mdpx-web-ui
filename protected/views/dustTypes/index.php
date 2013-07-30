<?php
/* @var $this DustTypesController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Dust Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
