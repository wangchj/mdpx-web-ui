<?php
/* @var $this VesselSetupsController */
/* @var $model VesselSetups */

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/treetable/javascripts/src/jquery.treetable.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.theme.default.css');

$this->menu = array(
    array(
        array('label'=>'Setup Summary', 'route'=>'view', 'params'=>array('id'=>$model->vesselSetupId)),
        array('label'=>'Parts List', 'route'=>'partsList', 'params'=>array('id'=>$model->vesselSetupId)),
        array('label'=>'Parts Tree', 'route'=>'tree', 'params'=>array('id'=>$model->vesselSetupId)),
    )
);
?>

<h1>View Vessel Setup #<?= $model->vesselSetupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array('label'=>'Vessel Setup Id', 'name'=>'vesselSetupId'),
        array('label'=>'Vessel Setup Name', 'name'=>'name'),
        array('label'=>'Create Time', 'name'=>'dateTime'),
    ),
)); ?>

<br/>

<!-- div class="alert alert-info">
    You may right click on the following table to add or edit setup parts.
</div -->

<?if(count($setupParts) == 0):?>

    <div class="alert alert-info">This setup has no parts.
        <a href="<?=$this->createUrl('setupParts/create', array('vesselSetupId'=>$model->vesselSetupId, 'parent'=>null,'retUrl'=>$this->createUrl('vesselSetups/tree', array('id'=>$model->vesselSetupId))))?>">Add a part</a>.
    </div>

<?else:?>

<table id="tree-table" class="treetable">
    <thead>
    <tr>
        <th>Part Name</th>
        <th>Part Serial Number</th>
        <th>Location</th>
        <th>Setup Part ID</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($setupParts as $setupPart)
    {
        renderNode($setupPart);
    }

    ?>
    </tbody>
</table>
<?endif;?>

<?php
function renderNode($setupPart)
{
    //$icon = $partCat->isGroup? 'folder' : 'file';
    //$parent = $partCat->parent == null ? '0', $partCat->parent;
    //$partCount = $partCat->isGroup ? '' : count($partCat->parts);

    //Output <tr data-tt-id= ... >
    echo "<tr data-tt-id=\"$setupPart->setupPartId\" data-tt-parent-id=\"$setupPart->parent\">";
    echo "<td><span>" . $setupPart->part0->type0->name . "</span></td>";
    echo "<td>$setupPart->part</td>";
    echo "<td>$setupPart->port</td>";
    echo "<td>$setupPart->setupPartId</td>";
    echo '</tr>';

    if(count($setupPart->setupParts) > 0)
        foreach($setupPart->setupParts as $setupPart0)
            renderNode($setupPart0);
}
?>

<?if($this->hasAnyAccess(array('setupParts/create','setupParts/update', 'setupParts/delete'))):?>
<ul id="menu-part" class="dropdown-menu context-menu" role="menu" aria-labelledby="dropdownMenu">
<?if($this->hasAccess('setupParts', 'create')):?><li><a href="javascript:createClicked()">Add New Setup Part</a></li><?endif?>
<?if($this->hasAccess('setupParts', 'update')):?><li><a href="javascript:editClicked()">Edit Setup Part</a></li><?endif?>
<?if($this->hasAccess('setupParts', 'delete')):?><li><a href="javascript:deleteClicked()">Delete Setup Part</a></li><?endif?>
</ul>
<?endif?>


<script type="text/javascript">

    <?if($this->hasAccess('setupParts', 'create')):?>
    function createClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        var url = '<?= $this->createUrl('setupParts/create', array('vesselSetupId'=>$model->vesselSetupId, 'parent'=>'_pid','retUrl'=>$this->createUrl('vesselSetups/tree', array('id'=>$model->vesselSetupId))))?>';
        url = url.replace('_pid', nodeId);
        window.location = url;
    }
    <?endif?>

    <?if($this->hasAccess('setupParts', 'update')):?>
    function editClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        var url = '<?php echo $this->createUrl('setupParts/update', array('id'=>'_spid','retUrl'=>$this->createUrl('vesselSetups/tree', array('id'=>$model->vesselSetupId))))?>'.replace('_spid', nodeId);
        window.location = url;
    }
    <?endif?>

    <?if($this->hasAccess('setupParts', 'delete')):?>
    function deleteClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        var url = '<?=$this->createUrl('setupParts/delete', array('id'=>'_spid','ajax'=>'1'))?>'.replace('_spid', nodeId);
        jQuery.ajax(
            {
                url:url,
                type:'POST',
                success: function(data, status, request){
                    location.reload();
                },
                error: function(request, status, error)
                {
                    if(request.responseText.indexOf('SQLSTATE[23000]: Integrity constraint') > 0)
                        alert('Integrity Constraint Violation');
                    else
                        alert('Error: ' + request.responseText);
                }
            }
        );
    }
    <?endif?>

    $(function()
    {
        //Make treetable
        $("#tree-table").treetable({expandable:true});
        $('#tree-table').treetable('expandAll');

        // Highlight selected row
        $("#tree-table").on("mousedown", "tr", function() {
            $(".selected").not(this).removeClass("selected");
            $(this).addClass("selected");
            //$(this).toggleClass("selected");
        });

        <?if($this->hasAnyAccess(array('setupParts/create','setupParts/update', 'setupParts/delete'))):?>
        $("#tree-table tbody tr").bind('contextmenu',
            function(event){
                var node = $(this);
                var nodeId = node.attr('data-tt-id');

                //Hide any menu currently on the page
                $('.context-menu').hide();

                //Show menu
                $('#menu-part').css({left: event.pageX + 2 , top: event.pageY + 2}).show();

                //Return false to not show browser context menu
                return false;
            }
        );
        <?endif?>

        $(document).bind('click', function(event){
            if(event.which == 1) $('.context-menu').hide();
        });
    });
</script>
