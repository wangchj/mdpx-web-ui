<?php /* @var $this Controller */ ?>

<?php
switch($this->id)
{
    /**
     * $menuItems - an array of horizontal sub-main menu.
     *
     * Item syntax: array('label of item', 'controllerId')
     */

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
    case 'setupParts':
        $menuItems = array(
            array('Vessel Setups', 'vesselSetups'),
            array('Setup Parts', 'setupParts')
            );
        $menuCategory = 'Setup';
        break;
    case 'experimentSetups':
    case 'experiments':
    case 'measurements':
        $menuItems = array(
            array('Experiment Groups', 'experiments'),
            array('Experiment Setups', 'experimentSetups'),
            array('Measurements', 'measurements'),
        );
        $menuCategory = 'Experiment';
        break;
    case 'users':
    case 'roles':
    case 'rolePermissions':
        $menuItems = array(
            array('Users', 'users'),
            array('Roles', 'roles'),
            array('Role Permissions', 'rolePermissions')
        );
        $menuCategory = 'Admin';
        break;
}
?>

<?php $this->beginContent('//layouts/main', array('menu'=>isset($menuCategory)?$menuCategory:null)); ?>

<?php
    if(isset($menuItems))
    {//Render the 2nd level menu
        echo '<ul class="nav nav-pills">';
        foreach($menuItems as $menuItem)
        {
            //Output <li> open tag
            echo '<li'; if($this->id == $menuItem[1]) echo ' class="active"'; echo '>';
            //Output <a href></a></li>
            echo '<a href="' . $this->createUrl($menuItem[1] . '/') . '">' . $menuItem[0] . '</a></li>';
        }
        echo '</ul>';
    }
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