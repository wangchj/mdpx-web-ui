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
    window.location = "PartCategories/create?parent=" + key;
}

function editClicked(action, node)
{
    var key = node.data.key;
    window.location = "PartCategories/update?id=" + key;
}

function deleteClicked(action, node)
{
    var key = node.data.key;
    window.location = "PartCategories/delete?id=" + key;
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
