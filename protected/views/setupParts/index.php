<?php
/* @var $this SetupPartsController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Setup Parts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
