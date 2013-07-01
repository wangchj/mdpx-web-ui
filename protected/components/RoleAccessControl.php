<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangchj
 * Date: 6/26/13
 * Time: 9:22 AM
 * To change this template use File | Settings | File Templates.
 */

if(!defined('ALLOW')) define('ALLOW', 'allow');
if(!defined('DENY')) define('DENY', 'deny');
if(!defined('INCONCLUSIVE')) define('INCONCLUSIVE', 'inconclusive');

class RoleAccessControl extends CApplicationComponent {

    public function hasAccess($userId, $controllerId, $actionId)
    {
        //Get user roles
        $user = Users::model()->findByPk($userId);
        $roles = $user->roles;

        //Check if each role can access operation (controller and action)
        foreach($roles as $role)
        {
            $result = $this->checkRoleAccess($role->roleId, $controllerId, $actionId);
            if($result == ALLOW)
                return true;
            if($result == DENY)
                return false;
        }

        return false;
    }

    public function checkRoleAccess($roleId, $controllerId, $actionId)
    {
        //Get role permissions
        $role = Roles::model()->findByPk($roleId);
        $perms = $role->rolePermissions;

        //First check deny permissions
        foreach($perms as $perm)
        {
            if ($this->controllerMatch($controllerId, $perm->controllerId) &&
                $this->actionMatch($actionId, $perm->actionId) &&
                $perm->access == DENY
            )
                return DENY;
        }

        //Check allow permissions
        //First check deny permissions
        foreach($perms as $perm)
        {
            if (self::controllerMatch($controllerId, $perm->controllerId) &&
                self::actionMatch($actionId, $perm->actionId) &&
                $perm->access == ALLOW
            )
                return ALLOW;
        }

        return INCONCLUSIVE;
    }

    /**
     * @param $controllerId string controllerId to be check against a permission
     * @param $permControllerId string controllerId of a permission
     * @return bool true if controller IDs match
     */
    public static function controllerMatch($controllerId, $permControllerId)
    {
        if($permControllerId == '*')
            return true;
        return $controllerId == $permControllerId;
    }

    /**
     * @param $actionId string actionId to be check against a permission
     * @param $permActionId string actionId or actionGroupId of a permission
     * @return bool true if action IDs match.
     */
    public static function actionMatch($actionId, $permActionId)
    {
        if($permActionId == '*')
            return true;
        if($actionId == $permActionId)
            return true;
        if(isset(self::$actionGroups[$permActionId]))
            foreach(self::$actionGroups[$permActionId] as $val)
                if($val == $actionId)
                    return true;

        return false;
    }

    /**
     * @var array a list of action groups.
     */
    public static $actionGroups = array(
        'read'=>array('list','index','view','treeview')
    );

    /**
     * Translates controller ID to database object id to be used in database access
     * authorization.
     *
     * Usually controller ID translate directly to database object ID. For example,
     * 'users' translates to Users table, and 'parts' translates to Parts table, in the
     * database.
     *
     * @param $controllerId string controller ID (ex: UsersController which has id users).
     * @return string The database object ID corresponds to the controller ID.
     */
//    public static function controllerTranslation($controllerId)
//    {
//        return ucfirst($controllerId);
//    }
//
//
//    public static function actionTranslation($controllerId, $actionId)
//    {
//        switch($actionId)
//        {
//            case 'grid':
//            case 'list':
//                return 'read';
//            case 'create':
//                return 'insert';
//            case 'update':
//                return 'update';
//        }
//    }
}