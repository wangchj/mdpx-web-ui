<?php
/* @var $this RolePermissionsController */
/* @var $model RolePermissions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-permissions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'roleId'); ?>
		<?php echo $form->textField($model,'roleId',array('readonly'=>true, 'value'=>$model->role->roleName)); ?>
		<?php echo $form->error($model,'roleId'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'controllerId'); ?>
        <?php echo $form->textField($model,'controllerId', array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'controllerId'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'actionId'); ?>
        <?php echo $form->textField($model,'actionId', array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'actionId'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'access'); ?>
        <?php echo $form->dropDownList($model,'access',array('allow'=>'allow','deny'=>'deny')); ?>
        <?php echo $form->error($model,'access'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn', 'submit'=>array('roles/view','id'=>$model->roleId))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->