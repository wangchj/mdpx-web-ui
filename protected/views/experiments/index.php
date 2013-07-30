<?php
/* @var $this ExperimentsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Experiments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
