<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
