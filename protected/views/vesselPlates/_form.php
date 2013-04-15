<?php
/* @var $this VesselPlatesController */
/* @var $model VesselPlates */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vessel-plates-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId', array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'side'); ?>
		<!-- ?php echo $form->textField($model,'side'); ? -->
        <?php echo $form->dropDownList($model,'side',ChamberSides::getSideDropdownList($model->vesselSetup->chamber0->type)); ?>
		<?php echo $form->error($model,'side'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'plate'); ?>
        <!-- ?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'plate',Parts::getPartsDropdownList()); ?>
        <?php echo $form->error($model,'plate'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">
    $(function(){
        $('#cancelBtn').click(function(){
            window.location = "<?php echo $this->createAbsoluteUrl('vesselSetup/view', array('id'=>$model->vesselSetup->vesselSetupId)) ?>";
        });

    });
</script>