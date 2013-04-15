<?php
/* @var $thisChambersController */
/* @var $model Chambers */
/* @var $form CActiveForm */

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/jquery/jquery-ui.custom.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/dist/jquery.dynatree-1.2.4.js');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/src/skin-vista/ui.dynatree.css');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'serialNum'); ?>
		<?php echo $form->textField($model,'serialNum',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'serialNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->hiddenField($model,'type'); ?>
		<input type="text" id="text_type" readonly="readonly" data-toggle="modal" role="button"
               <?php if($model->type0 != null){ ?>
               value="<?php echo $model->type . ' ' . $model->type0->name ?>"
                       <?php } ?>
                style="background-color:#ffffff"/>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

<!--	<div class="row">
		<?php /*echo $form->labelEx($model,'addedOn'); */?>
		<?php /*echo $form->textField($model,'addedOn'); */?>
		<?php /*echo $form->error($model,'addedOn'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'addedBy'); */?>
		<?php /*echo $form->textField($model,'addedBy'); */?>
		<?php /*echo $form->error($model,'addedBy'); */?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::button('Cancel', array('id'=>'cancelBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
function renderTree(array $tree)
{
    if(count($tree) > 0){
        echo '<ul>';

        foreach($tree as $node)
        {
            $id = $node['id'];
            $name = $node['name'];
            $isGroup = $node['isGroup'] == 1 ? 'true' : 'false';

            //Render the open tag of current node.
            if($node['isGroup'] == 1)
                echo "<li class=\"folder\" data=\"key:$id,isFolder:true,expand:true\">$id: $name";
            else
                echo "<li class=\"part\" data=\"key:$id,isFolder:false\">$id: $name";
            //Render children of current node.
            if($node['isGroup'] == 1)
                renderTree($node['children']);

            //Render the close tag of current node.
            echo "</li>";
        }

        echo '</ul>';
    }
}
?>

<!--
<div id="tree" style="width:500px;height:300px;display:none">

    <ul>
        <li data="isFolder:true,expand:true">All Categories
            <?php
            renderTree($tree)
            ?>
        </li>
    </ul>
</div>
-->

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Select Part Type</h3>
    </div>
    <div id="tree" class="modal-body">

            <ul>
                <li data="isFolder:true,expand:true">All Categories
                    <?php
                    renderTree($tree)
                    ?>
                </li>
            </ul>

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        // Attach the dynatree widget to an existing <div id="tree"> element
        // and pass the tree options as an argument to the dynatree() function:
        $("#tree").dynatree({
            onActivate: function(node) {
                // A DynaTreeNode object is passed to the activation handler
                // Note: we also get this event, if persistence is on, and the page is reloaded.
                //alert("You activated " + node.data.title);
            },
            persist: false,
            onClick: function(node, event) {
                if(!node.data.isFolder)
                {
                    $("#text_type").val(node.data.title);
                    $("#Parts_type").val(node.data.key);
                    $('#myModal').modal('toggle');
                }


            },
            onCreate: function(node, span){
                //bindContextMenu(span);
            }
        });
        $('#text_type').click(function(){
            $('#myModal').modal('toggle');
        });

        $('#cancelBtn').click(function(){
            window.location = "<?php putAppUlr()?>/index.php/Chambers";
        });

    });
</script>