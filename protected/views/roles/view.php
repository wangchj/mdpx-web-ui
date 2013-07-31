<?php
/* @var $this RolesController */
/* @var $model Roles */
/* @var $perm RolePermissions */

$this->menu = array(
    array(
        array('label'=>'Permissions', 'route'=>'roles/view', 'params'=>array('id'=>$this->actionParams['id'])),
        array('label'=>'Add Permission', 'route'=>'rolePermissions/create', 'params'=>array('roleId'=>$this->actionParams['id']))
    )
);
?>

<h1>Permissions for <?php echo $model->roleName ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'roleId',
		'roleName',
	),
)); */?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'roles-grid',
    'dataProvider'=>$perm->search(),
    //'filter'=>$perm,
    'columns'=>array(
        //'roleId',
        'controllerId',
        'actionId',
        'access',
        array(
            'header'=>'Action',
            'class'=>'CButtonColumn',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update'=>array(
                    'url'=>'Yii::app()->controller->createUrl(
                        "rolePermissions/update",
                        array("roleId"=>$data["roleId"],
                        "controllerId"=>$data["controllerId"],
                        "actionId"=>$data["actionId"]))'),
                'delete'=>array(
                    'url'=>'Yii::app()->controller->createUrl(
                        "rolePermissions/delete",
                        array("roleId"=>$data["roleId"],
                        "controllerId"=>$data["controllerId"],
                        "actionId"=>$data["actionId"]))'),

            ),
        ),
    ),
)); ?>
