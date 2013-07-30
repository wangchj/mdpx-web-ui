<?php
/* @var $this ExperimentSetupsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Experiment Setups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
