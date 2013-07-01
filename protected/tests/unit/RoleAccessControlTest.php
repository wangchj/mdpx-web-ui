<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangchj
 * Date: 6/27/13
 * Time: 2:25 PM
 * To change this template use File | Settings | File Templates.
 */

Yii::import('application.components.RoleAccessControl');

class RoleAccessControlTest extends CDbTestCase
{

    public $fixtures = array(
        'users'=>'Users',
        'roles'=>'Roles',
        'userRoles'=>'UserRoles',
        'rolePermissions'=>'RolePermissions',
    );

    public function testHasAccess()
    {
        $access = new RoleAccessControl();

        //Admin user
        $user = Users::model()->findByAttributes(array('firstName'=>'admin', 'lastName'=>'admin'));
        $this->assertTrue($access->hasAccess($user->userId, 'partCategories', 'view'));
        $this->assertTrue($access->hasAccess($user->userId, 'partCategories', 'read'));
        $this->assertTrue($access->hasAccess($user->userId, 'partCategories', 'create'));
        $this->assertTrue($access->hasAccess($user->userId, 'partCategories', 'update'));
        $this->assertTrue($access->hasAccess($user->userId, 'partCategories', 'delete'));

        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'view'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'read'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'create'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'update'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'delete'));

        $this->assertTrue($access->hasAccess($user->userId, 'measurements', 'view'));
        $this->assertTrue($access->hasAccess($user->userId, 'measurements', 'read'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'create'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'update'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'delete'));


        //Operator user
        $user = Users::model()->findByAttributes(array('firstName'=>'operator', 'lastName'=>'operator'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'view'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'read'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'create'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'update'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'delete'));

        $this->assertTrue($access->hasAccess($user->userId, 'measurements', 'view'));
        $this->assertTrue($access->hasAccess($user->userId, 'measurements', 'read'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'create'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'update'));
        $this->assertFalse($access->hasAccess($user->userId, 'measurements', 'delete'));

        $this->assertFalse($access->hasAccess($user->userId, 'users', 'view'));

        //Reader user
        $user = Users::model()->findByAttributes(array('firstName'=>'reader', 'lastName'=>'reader'));
        $this->assertTrue($access->hasAccess($user->userId, 'parts', 'view'));
        $this->assertFalse($access->hasAccess($user->userId, 'users', 'view'));
        $this->assertFalse($access->hasAccess($user->userId, 'users', 'read'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'create'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'update'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'delete'));

        //No role
        $user = Users::model()->findByAttributes(array('firstName'=>'no_role', 'lastName'=>'no_role'));
        $this->assertFalse($access->hasAccess($user->userId, 'parts', 'view'));
    }

    public function testActionMatch()
    {
        $this->assertTrue(RoleAccessControl::actionMatch('list','*'));
        $this->assertTrue(RoleAccessControl::actionMatch('list','list'));
        $this->assertfalse(RoleAccessControl::actionMatch('update','list'));

        $this->assertTrue(RoleAccessControl::actionMatch('list','read'));
        $this->assertTrue(RoleAccessControl::actionMatch('view','read'));
        $this->assertTrue(RoleAccessControl::actionMatch('index','read'));
        $this->assertTrue(RoleAccessControl::actionMatch('treeview','read'));
        $this->assertFalse(RoleAccessControl::actionMatch('delete','read'));
    }
}