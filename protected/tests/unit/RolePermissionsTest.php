<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangchj
 * Date: 6/27/13
 * Time: 2:52 PM
 * To change this template use File | Settings | File Templates.
 */

class RolePermissionsTest extends CDbTestCase
{
    public $fixtures = array(
        'users'=>'Users',
        'roles'=>'Roles',
        'userRoles'=>'UserRoles',
        'rolePermissions'=>'RolePermissions',
    );

    public function testReadRolePermissions()
    {
        $role = Roles::model()->findByAttributes(array('roleName'=>'Admin'));
        $this->assertEquals(count($role->rolePermissions), 4);
    }
}
