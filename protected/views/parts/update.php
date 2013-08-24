<?php
/* @var $this PartsController */
/* @var $model Parts */
?>

<h1>Update Parts <?php echo $model->serialNum; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'rootCategories'=>$rootCategories)); ?>