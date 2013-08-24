<?php
/* @var $this PartsController */
/* @var $model Parts */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/treetable/javascripts/src/jquery.treetable.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.theme.default.css');

/**
 * Render part categories as 'treetable' rows
 */
function renderNode($partCat)
{
    $icon = $partCat->isGroup? 'folder' : 'file';
    //$parent = $partCat->parent == null ? '0', $partCat->parent;
    $partCount = $partCat->isGroup ? '' : count($partCat->parts);
    //Output <tr data-tt-id= ... >
    echo "<tr data-tt-id=\"$partCat->partCatId\" data-tt-parent-id=\"$partCat->parent\">";
    echo "<td><span class=\"$icon\">$partCat->name</span></td>";
    echo "<td>$partCat->partCatId</td>";
    //echo "<td>$partCat->description</td>";
    echo "<td>$partCount</td>";
    echo '</tr>';
    
    if(count($partCat->partCategories) > 0)
        foreach($partCat->partCategories as $partCat0)
            renderNode($partCat0);
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div>
		<?php echo $form->labelEx($model,'serialNum'); ?>
		<?php echo $form->textField($model,'serialNum',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'serialNum'); ?>
	</div>

	<div>
		<?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->hiddenField($model,'type'); ?>
		<input type="text" id="text_type" readonly="readonly" data-toggle="modal" role="button"
               <?php if($model->type0 != null){ ?>
               value="<?php echo $model->type . ' ' . $model->type0->name ?>"
                       <?php } ?>
                style="background-color:#ffffff"/>
		<?php echo $form->error($model,'type'); ?>
	</div>

<!--	<div>
		<?php /*echo $form->labelEx($model,'addedOn'); */?>
		<?php /*echo $form->textField($model,'addedOn'); */?>
		<?php /*echo $form->error($model,'addedOn'); */?>
	</div>

	<div>
		<?php /*echo $form->labelEx($model,'addedBy'); */?>
		<?php /*echo $form->textField($model,'addedBy'); */?>
		<?php /*echo $form->error($model,'addedBy'); */?>
	</div>-->

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
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
            <th>Part Count</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($rootCategories as $rootCategory)
        {
            renderNode($rootCategory);
        }

        ?>
        </tbody>
    </table>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        //     onClick: function(node, event) {
        //         if(!node.data.isFolder)
        //         {
        //             $("#text_type").val(node.data.title);
        //             $("#Parts_type").val(node.data.key);
        //             $('#myModal').modal('toggle');
        //         }
        //     },


        $('#tree-table').treetable({expandable:true});

        $('#text_type').click(function(){
            $('#myModal').modal('toggle');
        });

        $("#tree-table tbody tr").click(function(event){
            //Make selection
            $("#tree-table tr.selected").not(this).removeClass("selected");
            $(this).addClass("selected");

            //Set Part Category
            var selRow = $(this);
            var selSpan = selRow.find('span');

            if(selSpan.is('.file'))
            {
                $("#text_type").val(selSpan.text());
                $("#Parts_type").val(selRow.attr('data-tt-id'));
                $('#myModal').modal('toggle');
            }
        });

        $('#cancelBtn').click(function(){
            window.location = "<?php echo $this->createUrl('Parts/')?>";
        });

    });
</script>
