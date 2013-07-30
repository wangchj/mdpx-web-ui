<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<h1>View Users #<?php echo $model->userId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userId',
		'firstName',
		'lastName',
		'phone',
		'email',
		'affiliation',
		'password',
	),
)); ?>
