<?php
/* @var $this UsersController */
/* @var $model Users */
?>

<?
$this->menu = array(
    array(
        array('label'=>'Account Info', 'route'=>'account/info'),
        array('label'=>'Update Info', 'route'=>'account/update'),
        array('label'=>'Change Password', 'route'=>'account/changePassword'),
    ),
);
?>

<h1>Update Account</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>