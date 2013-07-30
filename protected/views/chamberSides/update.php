<?php
/* @var $this ChamberSidesController */
/* @var $model ChamberSides */
?>

<h1>Update Side <?php echo $model->sideId; ?> of <?php echo $model->chamberType0->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'nextLargerSide'=>$nextLargerSide)); ?>