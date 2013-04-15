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
        <?php echo $form->labelEx($model,'camera'); ?>
        <!-- ?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'camera',Parts::getPartsDropdownList()); ?>
        <?php echo $form->error($model,'camera'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'positionR'); ?>
        <?php echo $form->textField($model,'positionR',array('size'=>18,'maxlength'=>18)); ?>
        <?php echo $form->error($model,'positionR'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'positionZ'); ?>
        <?php echo $form->textField($model,'positionZ',array('size'=>18,'maxlength'=>18)); ?>
        <?php echo $form->error($model,'positionZ'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'lens'); ?>
        <!-- ?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'lens',Parts::getPartsDropdownList()); ?>
        <?php echo $form->error($model,'lens'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'filter'); ?>
        <!-- ?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'filter',Parts::getPartsDropdownList()); ?>
        <?php echo $form->error($model,'filter'); ?>
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
            window.location = "<?php echo $this->createAbsoluteUrl('VesselSetup/view', array('id'=>$model->vesselSetup->vesselSetupId)) ?>";
        });

    });
</script>