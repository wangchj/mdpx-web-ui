<?php /* @var $this Controller */ ?>

<?php
switch($this->id)
{
    case 'partCategories':
    case 'parts':
    case 'gasTypes':
    case 'dustTypes':
        $menuItems = array(
            array('Part Categories', 'partCategories'),
            array('Parts', 'parts'),
            array('Gas Types', 'gasTypes'),
            array('Dust Types', 'dustTypes')
        );
        $menuCategory = 'PartCatalog';
        break;
    case 'vesselSetups':
    case 'experimentSetups':
    case 'experiments':
        $menuItems = array(
            array('Vessel Setups', 'vesselSetups'),
            array('Experiment Setups', 'experimentSetups'),
            array('Experiments', 'experiments'),
        );
        $menuCategory = 'Setups';
        break;
    case 'users':
        $menuItems = array(
            array('Users', 'users'),
        );
        $menuCategory = 'Other';
        break;
}
?>

<?php $this->beginContent('//layouts/main', array('menu'=>$menuCategory)); ?>

<?php
    //Render the 2nd level menu
    echo '<ul class="nav nav-pills">';
    foreach($menuItems as $menuItem)
    {
        //Output <li> open tag
        echo '<li'; if($this->id == $menuItem[1]) echo ' class="active"'; echo '>';
        //Output <a href></a></li>
        echo '<a href="' . $this->createUrl($menuItem[1] . '/') . '">' . $menuItem[0] . '</a></li>';
    }
    echo '</ul>';
?>

<?php /*
<ul class="nav nav-pills">
    <li <?php if($this->id == 'partCategories') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/PartCategories">Part Categories</a></li>
    <li <?php if($this->id == 'parts') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/Parts">Parts</a></li>
    <li <?php if($this->id == 'gasTypes') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/GasTypes">Gas Types</a></li>
    <li <?php if($this->id == 'dustTypes') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/DustTypes">Dust Types</a></li>
</ul>
*/?>

<?php /*
<div class="row">
    <div class="span5">
        <ul class="nav nav-pills">
            <li <?php if($this->id == 'partCategories') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/PartCategories">Part Categories</a></li>
            <li <?php if($this->id == 'parts') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/Parts">Parts</a></li>
            <li <?php if($this->id == 'gasTypes') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/GasTypes">Gas Types</a></li>
            <li <?php if($this->id == 'dustTypes') echo 'class="active"'; ?>><a href="<?php putAppUrl()?>/index.php/DustTypes">Dust Types</a></li>
        </ul>
    </div>

    <div class="span5">
        <div class="btn-grp" style="display:inline-block;padding-top:2px">
            <ul>
                <li class="<?php if($this->id == 'partCategories') echo 'active'; ?>"><a href="<?php putAppUrl()?>/index.php/PartCategories">Grid View</a></li>
                <li class="<?php if($this->id == 'parts') echo 'active'; ?>"><a href="<?php putAppUrl()?>/index.php/Parts">List View</a></li>
            </ul>
        </div>

        <div class="btn-grp" style="display:inline-block;padding-top:2px">
            <ul>
                <li class="<?php if($this->id == 'partCategories') echo 'active'; ?>"><a href="<?php putAppUrl()?>/index.php/PartCategories">Add New</a></li>
            </ul>
        </div>
    </div>
</div>
*/?>

<?php echo $content; ?>
<?php $this->endContent(); ?>