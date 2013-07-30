<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<h1>Update Users <?php echo $model->userId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>