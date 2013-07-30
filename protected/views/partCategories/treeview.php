<script type="text/javascript">
    function bindContextMenu(span) {
        // Add context menu to this node:
        $(span).contextMenu({menu: "myMenu"}, function(action, el, pos) {
            // The event was bound to the <span> tag, but the node object
            // is stored in the parent <li> tag
            var node = $.ui.dynatree.getNode(el);
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

    function createClicked(action, node)
    {
        var key = node.data.key;
        window.location = "<?php echo $this->createUrl('create')?>?parent=" + key;
    }

    function editClicked(action, node)
    {
        var key = node.data.key;
        window.location = "<?php echo $this->createUrl('update')?>?id=" + key;
    }

    function deleteClicked(action, node)
    {
        var key = node.data.key;
        window.location = "<?php echo $this->createUrl('delete')?>?id=" + key;
    }

    $(function(){
        // Attach the dynatree widget to an existing <div id="tree"> element
        // and pass the tree options as an argument to the dynatree() function:
        $("#demo2").dynatree({
            onActivate: function(node) {
                // A DynaTreeNode object is passed to the activation handler
                // Note: we also get this event, if persistence is on, and the page is reloaded.
                //alert("You activated " + node.data.title);
            },
            persist: false,
            onClick: function(node, event) {
                // Close menu on click
                if( $(".contextMenu:visible").length > 0 ){
                    $(".contextMenu").hide();
//          return false;
                }
            },
            onCreate: function(node, span){
                bindContextMenu(span);
            }
        });

        /*    $('.dynatree-folder').mousedown(function(event){
                if(event.which==3)
                {
                    alert(this.children[2].innerText);
                }
            })*/
    });
</script>

<?php
/* @var $this PartCategoriesController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/jquery/jquery-ui.custom.js');
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/dist/jquery.dynatree-1.2.4.js');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/dynatree-1.2.4/src/skin-vista/ui.dynatree.css');

//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.contextMenu.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.ui.position.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/screen.js');
//Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/contextmenu/prettify/prettify.js');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/src/jquery.contextMenu.css');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/screen.css');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/contextmenu/prettify/prettify.sunburst.css');

Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/menu/jquery.contextMenu-custom.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/menu/jquery.contextMenu.css');
?>

<ul id="myMenu" class="contextMenu">
    <li class="add"><a href="#add">New</a></li>
    <li class="edit"><a href="#edit">Edit</a></li>
    <!-- li class="delete"><a href="#delete">Delete</a></li -->
</ul>

<h1>Part Categories</h1>

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
                echo "<li data=\"key:$id,isFolder:false\">$id: $name";
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

<div id="demo2" style="width:100%;">

	<ul>
        <li data="isFolder:true,expand:true">All Categories
            <?php
                renderTree($tree)
            ?>
        </li>
    </ul>
<!--
        <li id="rhtml_1" class="folder">
			<a href="#">Root node 1</a>
			<ul>
				<li id="rhtml_2">
					<a href="#">Child node 1</a>
				</li>
				<li id="rhtml_3">
					<a href="#">Child node 2</a>
				</li>
			</ul>
		</li>
		<li id="rhtml_4">
			<a href="#">Root node 2</a>
		</li>
	</ul>
	-->
</div>
