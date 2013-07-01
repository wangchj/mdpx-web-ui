<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangchj
 * Date: 6/26/13
 * Time: 11:28 AM
 * To change this template use File | Settings | File Templates.
 */

class UsersTest extends CDbTestCase
{
    public $fixtures = array(
        'users'=>'Users'
    );

    public function testRead()
    {
        $user = Users::model()->findByAttributes(array('firstName'=>'admin', 'lastName'=>'admin'));
        $this->assertEquals($user->email, 'admin@admin.com');
        $this->assertEquals($user->phone, '3333333333');
    }

    public function testRoleRead()
    {
        $user = Users::model()->findByAttributes(array('firstName'=>'admin', 'lastName'=>'admin'));
        $this->assertEquals(1, count($user->roles));
        $this->assertEquals($user->roles[0]->roleName, 'Admin');
    }

    //public function testUserRoles()
    //{

        //$user = Users::model()->find(array('firstName'=>'User1', 'lastName'=>'Test'));
    //}

}