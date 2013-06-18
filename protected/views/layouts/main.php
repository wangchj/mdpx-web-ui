<?php /* @var $this Controller */ ?>

<?php
Yii::app()->clientScript->registerCoreScript('jquery');

Yii::app()->getClientScript()->registerScriptFile(getAppUrl().'/bootstrap/js/bootstrap.js');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/bootstrap.css');
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/bootstrap-responsive.css');
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
    <!-- Twitter Bootstrap -->
    <!--
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.css" />
    <script type="text/javascript" src="<?php putAppUlr()?>/bootstrap/js/bootstrap.js"></script>
    -->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    
    <!-- jQuery>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
    -->
    
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

<div class="container" id="page">

    <!--
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->


    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <li class="dropdown">
                    <a id="pc_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/PartCategories" data_target="#">Part Categories</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/PartCategories">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/PartCategories/treeview">Tree View</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/PartCategories/create">Add</a></li>
                 <!--       <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--><!--       <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>-->
                    </ul>
                </li>
                <li class="dropdown">
                    <a id="prt_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/Parts">Parts</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Parts">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Parts/create">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a id="chbr_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/Chambers">Chambers</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Chambers">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Chambers/create">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a id="gt_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/GasTypes">Gas Types</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/GasTypes">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/GasTypes/create">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a id="dt_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/DustTypes">Dust Types</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/DustTypes">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/DustTypes/create">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a id="vs_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/VesselSetups">Vessel Setups</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/VesselSetups">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/VesselSetups/create">Add</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $this->createAbsoluteUrl('ExperimentSetups/')?>">Experiment Setups</a></li>
                <li><a href="<?php echo $this->createAbsoluteUrl('Experiments/')?>">Experiments</a></li>
                <li><a href="<?php echo $this->createAbsoluteUrl('Measurements/')?>">Measurements</a></li>
                <li class="dropdown">
                    <a id="user_dd" class="dropdown-toggle" data-toggle="dropdown" href="<?php echo getAppUrl()?>/index.php/Users">Users</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Users">View</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo getAppUrl()?>/index.php/Users/create">Add</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

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

	<!-- div id="mainmenu" -->
		<?php /*
            $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		    )); */
        ?>
	<!-- /div --><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>


	<?php echo $content; ?>


	<div class="clear"></div>

	<div class="row" id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
