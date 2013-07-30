<?php
/* @var $this VesselPlatesController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Vessel Plates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
