<?php
/* @var $this SetupPartsController */
/* @var $model SetupParts */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/treetable/javascripts/src/jquery.treetable.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.theme.default.css');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setup-parts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'vesselSetupId'); ?>
		<?php echo $form->textField($model,'vesselSetupId', array('value'=>$model->vesselSetup->name . " ($model->vesselSetupId)", 'disabled'=>true, 'class'=>'span4')); ?>
		<?php echo $form->error($model,'vesselSetupId'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'part'); ?>
        <?php echo $form->hiddenField($model,'part'); ?>
		<?php echo CHtml::textField('SetupParts_part_text',
            $model->part == null ? '' : $model->part0->type0->name . ' (' . $model->part . ')',
            array('class'=>'span4', 'size'=>30, 'maxlength'=>30, 'data-toggle'=>'modal', 'role'=>'button'));?>
		<?php echo $form->error($model,'part'); ?>
	</div>

    <?if($model->isCamera()):?>
    <!-- SetupCameras -->
    <div id="setupCamerasGroup" class="auxField">
        <?= $form->labelEx($setupCam, 'positionR'); ?>
        <?= $form->textField($setupCam, 'positionR', array('class'=>'span4')); ?>
        <?= $form->error($setupCam,'positionR'); ?>

        <?= $form->labelEx($setupCam, 'positionZ'); ?>
        <?= $form->textField($setupCam, 'positionZ', array('class'=>'span4')); ?>
        <?= $form->error($setupCam,'positionZ'); ?>

        <?= $form->labelEx($setupCam, 'lens'); ?>
        <?= $form->hiddenField($setupCam,'lens'); ?>
        <?= CHtml::textField('SetupCameras_lens_text',
            $setupCam->lens == null ? '' : $setupCam->lens0->type0->name . ' (' . $setupCam->lens . ')',
            array('class'=>'span4')); ?>
        <?= $form->error($setupCam,'lens'); ?>

        <?= $form->labelEx($setupCam, 'filter'); ?>
        <?= $form->hiddenField($setupCam,'filter'); ?>
        <?= CHtml::textField('SetupCameras_filter_text',
            $setupCam->filter == null ? '' : $setupCam->filter0->type0->name . ' (' . $setupCam->filter . ')',
            array('class'=>'span4')); ?>
        <?= $form->error($setupCam,'filter'); ?>
    </div>
    <!-- End SetupCameras -->
    <?endif;?>

    <?if($model->isProbe()):?>
    <!-- SetupProbes -->
    <div id="setupProbesGroup" class="auxField">
        <?= $form->labelEx($setupProbe, 'length'); ?>
        <?= $form->textField($setupProbe, 'length', array('class'=>'span4')); ?>
        <?= $form->error($setupProbe,'length'); ?>

        <?= $form->labelEx($setupProbe, 'width'); ?>
        <?= $form->textField($setupProbe, 'width', array('class'=>'span4')); ?>
        <?= $form->error($setupProbe,'width'); ?>
    </div>
    <!-- End SetupProbes -->
    <?endif;?>

	<div>
		<?php echo $form->labelEx($model,'parent'); ?>
		<div class="input-append">
            <?php echo $form->textField($model,'parent', array('value'=>$model->parent == null ? '' : $model->parent0->part0->type0->name, 'readonly'=>true, 'class'=>'span4')); ?>
            <button type="button" class="btn" onClick="$('#SetupParts_parent').val('');" <?=$this->action->id == 'update' ? 'disabled' : ''?>>Make Root</button>
        </div>
        <?php echo $form->error($model,'parent'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'port'); ?>
		<?php echo $form->textField($model,'port', array('class'=>'span4')); ?>
		<?php echo $form->error($model,'port'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?= CHtml::button('Cancel', array('onClick'=>'javascript:window.location=\''.(isset($_GET['retUrl']) ? $_GET['retUrl'] : $this->createUrl('index')) . '\''))?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Select Part Type</h3>
    </div>
    <div id="tree" class="modal-body">

        <table id="tree-table" class="treetable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Identifier</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $categories = PartCategories::model()->findAll('parent IS NULL');

            foreach ($categories as $category)
            {
                renderNode($category);
            }

            ?>
            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<?php
/**
 * Render part categories as 'treetable' rows
 */
function renderNode($partCat)
{
    //$icon = $partCat->isGroup? 'folder' : 'file';
    //$parent = $partCat->parent == null ? '0', $partCat->parent;
    //$partCount = $partCat->isGroup ? '' : count($partCat->parts);
    //Output <tr data-tt-id= ... >
    echo "<tr data-tt-id=\"$partCat->partCatId\" data-tt-parent-id=\"$partCat->parent\">";
    echo "<td><span class=\"folder\">$partCat->name</span></td>";
    echo "<td>$partCat->partCatId</td>";
    //echo "<td>$partCat->description</td>";
    //echo "<td>$partCount</td>";
    echo '</tr>';

    if(count($partCat->partCategories) > 0)
        foreach($partCat->partCategories as $partCat0)
            renderNode($partCat0);

    if(count($partCat->parts) > 0)
        foreach($partCat->parts as $part)
            renderPart($partCat, $part);
}

function renderPart($partCat, $part)
{
    echo "<tr data-tt-id=\"$part->serialNum\" data-tt-parent-id=\"$part->type\">";
    echo "<td><span class=\"file\">$partCat->name</span></td>";
    echo "<td>$part->serialNum</td>";
    //echo "<td>$partCat->description</td>";
    //echo "<td>$partCount</td>";
    echo '</tr>';
}
?>

<script type="text/javascript">

    function createClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('setupParts/create')?>?parent=" + nodeId;
    }

    function editClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('setupParts/update')?>?id=" + nodeId;
    }

    function deleteClicked(action, node)
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('setupParts/delete')?>?id=" + key;
    }

    $(function()
    {
        //Set Part field readonly if action is update
        if(<?=($this->action->id == 'update' ? 'true' : 'false')?>)
            $('#SetupParts_part_text').attr('readonly', true);

        //Set visibility of relevant aux fields
        toggleAuxFields();

        //Make treetable
        $("#tree-table").treetable({expandable:true});

        //Treetable row click
        $("#tree-table").on("click", "tr", function() {
            if($(this).find('span').is('.file'))
            {
                //Highlight selected row
                $(".selected").not(this).removeClass("selected");
                $(this).addClass("selected");

                //Select part and close modal
                var trigger = window.modalTrigger;
                var fieldId = trigger.id.replace(/_text$/, ''); //Remove '_text' from end of trigger ID.
                $(trigger).val($(this).find('span').text() + ' (' + $(this).attr('data-tt-id') + ')');
                $('#' + fieldId).val($(this).attr('data-tt-id'));
                $('#myModal').modal('toggle');

                //If the modal trigger is part field, hide and show corresponding fields.
                if(fieldId == 'SetupParts_part')
                {
                    toggleAuxFields();
                }
            }
        });

        //Open part selection modal when clicked
        <?if($this->action->id != 'update'):?>
        $('#SetupParts_part_text').click(function(){
            window.modalTrigger = this;
            $('#myModal').modal('toggle');
        })
        <?endif;?>
        $('#SetupCameras_lens_text, #SetupCameras_filter_text').click(function(){
            window.modalTrigger = this;
            $('#myModal').modal('toggle');
        });
    });

    /**
     * Hide and show aux fields based on the part type.
     *
     * For example, if the value of the part
     * field indicates a camera, the fields for camera is shown, and aux field for other part
     * type is hidden.
     */
    function toggleAuxFields()
    {
        $('.auxField').hide();
        if($('#SetupParts_part').val().substr(0, 5) == '35-01')
            $('#setupCamerasGroup').show();
        else if($('#SetupParts_part').val().substr(0, 2) == '30')
            $('#setupProbesGroup').show();
    }
</script>

