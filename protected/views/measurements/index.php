<?php
/* @var $this MeasurementsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Measurements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
