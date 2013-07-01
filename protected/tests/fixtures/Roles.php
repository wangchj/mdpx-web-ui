<?php
/**
 * Test fixture for Roles table.
 * User: wangchj
 * Date: 6/26/13
 * Time: 4:51 PM
 */


return array(
    /**
     * Admin
     *
     * Allowed
     * - Read, create, update, delete: for all tables
     *
     * Denied:
     * - create, update, delete: Measurements
     */
    'role1'=>array('roleName'=>'Admin'),

    /**
     * Operator
     *
     * Allowed following permissions
     * - Read for all tables, except Users
     * - Create for all tables, except Users and Measurements
     *
     * Denied following permissions
     * - Create: Measurements
     * - Update, delete for all tables
     * - Read, create, update, delete: Users table
     */
    'role2'=>array('roleName' => 'Operator'),

    /**
     * Reader
     *
     * Allowed following permissions
     * - Read for all tables, except Users
     * - Create for all tables, except Users and Measurements
     *
     * Denied following permissions
     * - Create, update, delete: for all tables
     * - Read: Users table
     */
    'role3'=>array('roleName' => 'Reader'),
);

?>