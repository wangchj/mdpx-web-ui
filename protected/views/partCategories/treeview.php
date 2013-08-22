<?php
/* @var $this PartCategoriesController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/treetable/javascripts/src/jquery.treetable.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.theme.default.css');
?>

<h1>Part Categories</h1>

<table id="tree-table" class="treetable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Identifier</th>
        <th>Description</th>
        <th>Part Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rootCats as $rootCat)
    {
        renderNode($rootCat);
    }

    ?>
    </tbody>
</table>

<?php
function renderNode($partCat)
{
    $icon = $partCat->isGroup? 'folder' : 'file';
    //$parent = $partCat->parent == null ? '0', $partCat->parent;
    $partCount = $partCat->isGroup ? '' : count($partCat->parts);

    //Output <tr data-tt-id= ... >
    echo "<tr data-tt-id=\"$partCat->partCatId\" data-tt-parent-id=\"$partCat->parent\">";
    echo "<td><span class=\"$icon\">$partCat->name</span></td>";
    echo "<td>$partCat->partCatId</td>";
    echo "<td>$partCat->description</td>";
    echo "<td>$partCount</td>";
    echo '</tr>';

    if(count($partCat->partCategories) > 0)
        foreach($partCat->partCategories as $partCat0)
            renderNode($partCat0);
}
?>

<ul id="menu-group" class="dropdown-menu context-menu" role="menu" aria-labelledby="dropdownMenu">
    <li><a href="#" onclick="createClicked()">Add New Category</a></li>
    <li><a href="#" onclick="editClicked()">Edit Category</a></li>
</ul>

<ul id="menu-part" class="dropdown-menu context-menu" role="menu">
    <li><a href="#" onclick="editClicked()">Edit Category</a></li>
</ul>


<script type="text/javascript">
    function bindContextMenu(span) {
        // Add context menu to this node:
        $(span).contextMenu({menu: "menu"}, function(action, el, pos) {
            // The event was bound to the <span> tag, but the node object
            // is stored in the parent <li> tag
            var node = $.ui.fancytree.getNode(el);
            switch( action ) {
                case "add":
                    createClicked(action, node);
                    break;
                case "edit":
                    editClicked(action, node);
                    break;
                case "delete":
                    deleteClicked(action, node);
                    break;
                default:
                    alert("Todo: appply action '" + action + "' to node " + node);
            }
        });
    };

    function createClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('create')?>?parent=" + node.id;
    }

    function editClicked()
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('update')?>?id=" + nodeId;
    }

    function deleteClicked(action, node)
    {
        //Selected node
        var selNode = $('#tree-table tr.selected');
        var nodeId = selNode.attr('data-tt-id');
        window.location = "<?php echo $this->createUrl('delete')?>?id=" + key;
    }

    $(function()
    {
        //Make treetable
        $("#tree-table").treetable({expandable:true});

        // Highlight selected row
        $("#tree-table").on("mousedown", "tr", function() {
            $(".selected").not(this).removeClass("selected");
            $(this).addClass("selected");
            //$(this).toggleClass("selected");
        });

        $("#tree-table tbody tr").bind('contextmenu',
            function(event){
                var node = $(this);
                var nodeId = node.attr('data-tt-id');

                //Hide any menu currently on the page
                $('.context-menu').hide();

                if(node.find('span').is('.folder'))
                {
                    //Show menu for folder
                    $('#menu-group').css({left: event.pageX + 2 , top: event.pageY + 2}).show();
                }
                else
                    $('#menu-part').css({left: event.pageX + 2 , top: event.pageY + 2}).show();

                //Return false to not show browser context menu
                return false;
            }
        );

        $(document).bind('click', function(event){
            $('.context-menu').hide();
        });
    });
</script>