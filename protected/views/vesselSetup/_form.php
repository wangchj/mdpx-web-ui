<?php
/* @var $this VesselSetupController */
/* @var $model VesselSetup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vessel-setup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId'); ?>
		<?php echo $form->error($model,'vesselSetupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upperElectrode'); ?>
		<!-- ?php echo $form->textField($model,'upperElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'upperElectrode',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'upperElectrode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lowerElectrode'); ?>
		<!-- ?php echo $form->textField($model,'lowerElectrode',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'lowerElectrode',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'lowerElectrode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roughPump'); ?>
		<!-- ?php echo $form->textField($model,'roughPump',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'roughPump',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'roughPump'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'turboPump'); ?>
		<!-- ?php echo $form->textField($model,'turboPump',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'turboPump',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'turboPump'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'massFlowController'); ?>
		<!-- ?php echo $form->textField($model,'massFlowController',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'massFlowController',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'massFlowController'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pressureGauge'); ?>
		<!-- ?php echo $form->textField($model,'pressureGauge',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'pressureGauge',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'pressureGauge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dustShaker'); ?>
		<!-- ?php echo $form->textField($model,'dustShaker',array('size'=>10,'maxlength'=>10)); ? -->
        <?php echo $form->dropDownList($model,'dustShaker',Parts::getPartsDropdownList()); ?>
		<?php echo $form->error($model,'dustShaker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
var_dump(Parts::getPartsDropdownList());
?>

<script type="text/javascript">
    $(function(){
        $('#cancelBtn').click(function(){
            window.location = "<?php putAppUlr()?>/index.php/VesselSetup";
        });

    });
</script>