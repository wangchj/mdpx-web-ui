<?php
/* @var $this RolePermissionsController */
/* @var $model RolePermissions */
?>

<?php
$this->menu = array(
    array(
        array('label'=>'Permissions', 'route'=>'roles/view', 'params'=>array('id'=>$this->actionParams['roleId'])),
        array('label'=>'Add Permission', 'route'=>'rolePermissions/create', 'params'=>array('roleId'=>$this->actionParams['roleId']))
    )
);
?>
<h1>Update Role Permission <?php echo $model->roleId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>