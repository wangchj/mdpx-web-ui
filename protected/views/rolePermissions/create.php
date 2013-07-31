<?php
/* @var $this RolesController */
/* @var $model Roles */

$this->menu = array(
    array(
        array('label'=>'Permissions', 'route'=>'roles/view', 'params'=>array('id'=>$this->actionParams['roleId'])),
        array('label'=>'Add Permission', 'route'=>'rolePermissions/create', 'params'=>array('roleId'=>$this->actionParams['roleId']))
    )
);
?>

<h1>Create Roles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>