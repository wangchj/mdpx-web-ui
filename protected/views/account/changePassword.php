<?php
/* @var $this SiteController */
/* @var $model ChangePasswordForm */
/* @var $form CActiveForm */
?>

<?
$this->menu = array(
    array(
        array('label'=>'Account Info', 'route'=>'account/info'),
        array('label'=>'Update Info', 'route'=>'account/update'),
        array('label'=>'Change Password', 'route'=>'account/changePassword'),
    ),
);
?>

<h1>Change Password</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'change-password-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'oldPwd'); ?>
		<?php echo $form->passwordField($model,'oldPwd',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'oldPwd'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'newPwd'); ?>
		<?php echo $form->passwordField($model,'newPwd',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'newPwd'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'newPwd_repeat'); ?>
        <?php echo $form->passwordField($model,'newPwd_repeat',array('size'=>32,'maxlength'=>32)); ?>
        <?php echo $form->error($model,'newPwd_repeat'); ?>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Change Password'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
