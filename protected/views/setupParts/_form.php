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
		<?php echo CHtml::textField('part_text',
            $model->part == null ? '' : $model->part0->type0->name . ' (' . $model->part . ')',
            array('class'=>'span4', 'size'=>30, 'maxlength'=>30, 'data-toggle'=>'modal', 'role'=>'button'));?>
		<?php echo $form->error($model,'part'); ?>
	</div>

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
                $('#part_text').val($(this).find('span').text() + ' (' + $(this).attr('data-tt-id') + ')');
                $('#SetupParts_part').val($(this).attr('data-tt-id'));
                $('#myModal').modal('toggle');
            }
        });

        //Open part selection modal when clicked
        $('#part_text').click(function(){
            $('#myModal').modal('toggle');
        });
    });
</script>

