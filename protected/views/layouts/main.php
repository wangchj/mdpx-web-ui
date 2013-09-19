<?php /* @var $this Controller */ ?>

<?php
Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->getClientScript()->registerScriptFile(getAppUrl().'/bootstrap/js/bootstrap.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/bootstrap.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/sidenav.css');
//Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/bootstrap-responsive.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/css/btn-grp.css');
?>

<?php
if(!isset($menu))
    $menu = 'Welcome';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/print.css" media="print" />
-->

	<!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" / -->
	<!-- link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" / -->
    
    <!-- jQuery>
    <script type="text/javascript" src="<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
    -->
    <style>
        body{padding: 50px;}
    </style>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script type="text/javascript">
        //JavaScript for main dropdown menu
        $(function(){
            $('#pc_dd').hover(function(){
                $('.dropdown-toggle').dropdown();
            })
        })
    </script>

</head>

<body>

<!-- div class="container" id="page" -->

    <!--
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner" style="padding-left:35px;padding-right:35px">
            <ul class="nav">
                <!-- li <?php if($menu=='PartCatalog') echo 'class="active"'; ?>><a href="">Part Catalog</a></li -->
                <!-- li <?php if($menu=='Setups') echo 'class="active"'; ?>><a href="">Setups</a></li -->
                <!-- li <?php if($menu=='Other') echo 'class="active"'; ?>><a href="">Other</a></li -->
                <!-- li class="pull-right"><a class="pull-right" href="">Logout</a></li -->

                <li <?php if($menu=='Welcome') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php">Welcome</a></li>

                <li class="dropdown <?php if($menu=='PartCatalog') echo 'active'; ?>">
                    <a id="PartCatalog-menu" class="dropdown-toggle" data-toggle="dropdown" href="" data_target="#">Part Catalog <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/PartCategories">Part Categories</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Parts">Parts</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/GasTypes">Gas Types</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/DustTypes">Dust Types</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if($menu=='Setup') echo 'active'; ?>">
                    <a id="Setup-menu" class="dropdown-toggle" data-toggle="dropdown" href="" data_target="#">Setup <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/VesselSetups">Vessel Setups</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/SetupParts">Setup Parts</a></li>
                        <?php /*
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/ExperimentSetups">Experiment Setups</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Experiments">Experiments</a></li>
                        */?>
                    </ul>
                </li>
                <li class="dropdown <?php if($menu=='Experiment') echo 'active'; ?>">
                    <a id="Experiment-menu" class="dropdown-toggle" data-toggle="dropdown" href="" data_target="#">Experiment <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Experiments">Experiment Groups</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/ExperimentSetups">Experiment Setups</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Measurements">Measurements</a></li>
                    </ul>
                </li>
                <?php if(Yii::app()->accessManager->hasRole(Yii::app()->user->id, 'Admin')){?>
                <li class="dropdown <?php if($menu=='Admin') echo 'active'; ?>">
                    <a id="Admin-menu" class="dropdown-toggle" data-toggle="dropdown" href="<?php putAppUrl()?>/index.php/Users">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Users">Users</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/Roles">Roles</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php putAppUrl()?>/index.php/RolePermissions">Role Permissions</a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>
            <ul class="nav" style="float:right">
                <?php if(Yii::app()->user->isGuest){?>
                    <li><a href="<?=$this->createUrl('site/login')?>">Login</a></li>
                <?php } else {?>
                    <li class="dropdown">
                        <a id="Setups-menu" class="dropdown-toggle" data-toggle="dropdown" href="" data_target="#"><?=Yii::app()->user->name?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="">Account Info</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=$this->createUrl('site/changePassword')?>">Change Password</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=$this->createUrl('site/logout')?>">Logout</a></li>
                        </ul>
                    </li>
                <?php }?>


            </ul>
        </div> <!-- navbar-inner -->
    </div> <!-- navbar -->

<!-- div style="background-color: #f5f5f5; position:absolute;left:0px;width:100%; min-height: 30px">abc
</div -->
<!--    <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Part Categories</a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="http://google.com">Action</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#anotherAction">Another action</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
    </ul>
    </div>-->

	<?php //if(isset($this->breadcrumbs)):?>
		<?php //$this->widget('zii.widgets.CBreadcrumbs', array(
			//'links'=>$this->breadcrumbs,
		//)); ?><!-- breadcrumbs -->
	<?php //endif?>

	<?php echo $content; ?>


	<div class="clear"></div>

<!-- /div --><!-- page -->

</body>
</html>
