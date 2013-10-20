<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/maskedinput/jquery.maskedinput.min.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'firstName'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lastName'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

	<div>
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'affiliation'); ?>
		<?php echo $form->textField($model,'affiliation',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'affiliation'); ?>
	</div>

    <?if($this->id == 'site' && $this->action->id == 'register'):?>
	<div>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

    <div>
        <?php echo $form->labelEx($model,'password_repeat'); ?>
        <?php echo $form->passwordField($model,'password_repeat',array('size'=>32,'maxlength'=>32)); ?>
        <?php echo $form->error($model,'password_repeat'); ?>
    </div>
    <?endif;?>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?= CHtml::button('Cancel', array('onClick'=>'javascript:window.location=\''.(isset($_GET['retUrl']) ? $_GET['retUrl'] : $this->createUrl('index')) . '\''))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function(){
        //Format phone number field
        $('#Users_phone').mask("(999) 999-9999");
    });
</script>