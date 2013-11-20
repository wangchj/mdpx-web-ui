<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<?
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/treetable/javascripts/src/jquery.treetable.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/js/treetable/stylesheets/jquery.treetable.theme.default.css');
?>

<?
if($this->id == 'users')
{
    $this->menu = array(
        array(
            array('label'=>'Details', 'route'=>'users/view'),
            array('label'=>'Update', 'route'=>'users/update', 'params'=>array('id'=>$model->userId))
        ),
    );
}
if($this->id == 'account')
{
    $this->menu = array(
        array(
            array('label'=>'Account Info', 'route'=>'account/info'),
            array('label'=>'Update Info', 'route'=>'account/update'),
            array('label'=>'Change Password', 'route'=>'account/changePassword'),
        ),
    );
}
?>

<h1><?if($this->id == 'users'):?>User Details<?else:?>Account Info<?endif;?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('label'=>'User ID', 'name'=>'userId'),
		'firstName',
		'lastName',
		array('name'=>'phone','value'=>Users::formatPhone($model->phone)),
		'email',
		'affiliation',
	),
)); ?>


<table class="table">
<?
foreach($model->roles as $role)
{
    $remove = $this->createUrl('userRoles/delete',array('userId'=>$model->userId, 'roleId'=>$role->roleId));

    echo "<tr><td colspan='3'><strong>{$role->roleName}</strong>";
    if($this->id=='users')
        echo "<div style=\"display:inline-block;float:right\"><a class=\"removeRole\" href='{$remove}'><i class=\"icon-trash\"></i></a></div>";
    echo "</td></tr>";

    foreach($role->rolePermissions as $p)
        echo "<tr><td>{$p->controllerId}</td><td>{$p->actionId}</td><td>$p->access</td></tr>";

    //echo "<tr><td>"; outputRolePermissions($role); echo "</td></tr>";
}
?>
</table>

<?if($this->id == 'users'):?>
<a hef="#" onclick="addRole()" data-toggle"modal">Add Role</a>
<?endif;?>

<?
function outputRolePermissions($role)
{
    echo '<table class="table-stripped" width="100%">';
    foreach($role->rolePermissions as $permission)
    {
        echo "<tr><td>{$permission->controllerId}</td><td>{$permission->actionId}</td><td>$permission->access</td></tr>";
    }
    echo '</table>';
}
?>

<script tyle="text/javascript">

    //jQuery page init. This is run when page is loaded.
    $(function()
    {
        //Handler when remove role button is clicked.
        $('.removeRole').click(function(){
            if(!confirm('Are you sure you want to delete this item?'))
                return false;
            jQuery.ajax({
                type:'POST',
                url: $(this).attr('href'),
                success: function(){location.reload();}
            });

            return false;
        });

        //Handler when save button clicked.
        $('#saveBtn').click(function(){
            //Get all role IDs
            var roleIds = '';
            $('input:checked').each(function(){
                roleIds += $(this).attr('data-id') + '+';
            });

            //Make ajax url
            var url = '<?=$this->createUrl('userRoles/createAll', array('userId'=>$model->userId,'roleIdStr'=>'_roleId_'))?>'.replace('_roleId_', roleIds);

            //Make ajax call
            jQuery.ajax({
                type:'POST',
                url: url,
                success: function(){
                    $('#myModal').modal('toggle');
                    location.reload();
                },
                error: function(request, status, msg){alert(msg);}
            });

        });

        //Create tree table
        $("#tree").treetable({expandable:true});



    }); //End jQuery page init

    function addRole()
    {
        $('#myModal').modal('toggle');
    }

</script>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Select Part Type</h3>
    </div>
    <div id="tree-table" class="modal-body">

        <table id="tree" class="treetable">
            <tbody>
            <?php
            $roles = Roles::model()->findAll();

            foreach ($roles as $role)
            {
                //Role name
                echo "<tr data-tt-id=\"{$role->roleId}\" data-tt-parent-id=\"\"><td colspan=\"3\">
                        <label class=\"checkbox\" style=\"display:inline;padding-left:0px\">
                        <input style=\"margin-left:0px;margin-bottom:6px;float:inherit\" type=\"checkbox\" data-id=\"{$role->roleId}\"> {$role->roleName}</label></td></tr>\n";
                //Role permissions
                foreach($role->rolePermissions as $p)
                {
                    echo "<tr data-tt-id=\"{$p->roleId}-{$p->controllerId}\" data-tt-parent-id=\"{$role->roleId}\"><td>{$p->controllerId}</td><td>{$p->actionId}</td><td>{$p->access}</td></tr>\n";
                }
            }

            ?>
            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <button id="saveBtn" class="btn">Save</button>
    </div>
</div>
