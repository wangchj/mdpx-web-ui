<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/bootstrap/css/jumbotron.css');
?>

<div class="jumbotron masthead">
    <div class="container">
        <h1>MDPX Database</h1>
        <p>Database for MDPX</p>
        <?php
        if(Yii::app()->user->isGuest){
        ?>
        <p>
            <a href="<?=$this->createUrl('site/login')?>" class="btn btn-primary">Login</a>
        </p>
        <?php
        }
        else{
        ?>
        <ul class="masthead-links">
            <li>
                <a href="<?=$this->createUrl('partCategories/index')?>">Part Catalog</a>
            </li>
            <li>
                <a href="<?=$this->createUrl('vesselSetups/index')?>">Vessel Setups</a>
            </li>
            <li>
                <a href="<?=$this->createUrl('experiments/index')?>">Experiments</a>
            </li>

        </ul>
        <?php
        }
        ?>
    </div>
</div>

<?php /*
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>


<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
 */?>
