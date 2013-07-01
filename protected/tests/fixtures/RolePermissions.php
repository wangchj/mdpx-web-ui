<?php
/**
 * Test fixture for RolePermissions table.
 * User: wangchj
 */

if(!defined('ALLOW')) define('ALLOW', 'allow');
if(!defined('DENY')) define('DENY', 'deny');

if(!defined('READ')) define('READ', 'read');
if(!defined('CREATE')) define('CREATE', 'create');
if(!defined('UPDATE')) define('UPDATE', 'update');
if(!defined('DELETE')) define('DELETE', 'delete');

return array(
    /**
     * Admin
     */
    array('roleId'=>'1', 'controllerId'=>'*', 'actionId'=>'*', 'access'=>ALLOW),
    array('roleId'=>'1', 'controllerId'=>'measurements', 'actionId'=>CREATE, 'access'=>DENY),
    array('roleId'=>'1', 'controllerId'=>'measurements', 'actionId'=>UPDATE, 'access'=>DENY),
    array('roleId'=>'1', 'controllerId'=>'measurements', 'actionId'=>DELETE, 'access'=>DENY),

    /**
     * Operator
     */
    array('roleId'=>'2', 'controllerId'=>'*', 'actionId'=>READ, 'access'=>ALLOW),
    array('roleId'=>'2', 'controllerId'=>'*', 'actionId'=>CREATE, 'access'=>ALLOW),
    array('roleId'=>'2', 'controllerId'=>'*', 'actionId'=>UPDATE, 'access'=>DENY),
    array('roleId'=>'2', 'controllerId'=>'*', 'actionId'=>DELETE, 'access'=>DENY),
    array('roleId'=>'2', 'controllerId'=>'measurements', 'actionId'=>CREATE, 'access'=>DENY),
    array('roleId'=>'2', 'controllerId'=>'users', 'actionId'=>'*', 'access'=>DENY),


    /**
     * Reader
     */
    array('roleId'=>'3', 'controllerId'=>'*', 'actionId'=>READ, 'access'=>ALLOW),
    array('roleId'=>'3', 'controllerId'=>'*', 'actionId'=>CREATE, 'access'=>DENY),
    array('roleId'=>'3', 'controllerId'=>'*', 'actionId'=>UPDATE, 'access'=>DENY),
    array('roleId'=>'3', 'controllerId'=>'*', 'actionId'=>DELETE, 'access'=>DENY),
    array('roleId'=>'3', 'controllerId'=>'users', 'actionId'=>'*', 'access'=>DENY),
);

?>