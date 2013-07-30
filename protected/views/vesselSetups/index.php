<?php
/* @var $this VesselSetupsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Vessel Setups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
