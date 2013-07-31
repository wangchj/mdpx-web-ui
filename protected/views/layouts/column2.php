<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main-sub'); ?>

<?php
$actionId = $this->action->id;
//echo $this->createAbsoluteUrl('create');
?>

<table style="width:100%">
    <tr>
        <td style="vertical-align: top;width:150px">

            <?php /*
            <ul class="nav nav-list bs-docs-sidenav">
                <li <?php if($actionId == 'index') echo 'class="active"'; ?>>
                    <a href="<?php echo $this->createUrl('index')?>">
                        <i class="icon-chevron-right"></i> Grid View</a>
                </li>
                <li <?php if($actionId == 'treeview') echo 'class="active"'; ?>>
                    <a href="<?php echo $this->createUrl('treeview')?>">
                        <i class="icon-chevron-right"></i> Tree View</a>
                </li>
                <li <?php if($actionId == 'list') echo 'class="active"'; ?>>
                    <a href="<?php echo $this->createUrl('list')?>">
                        <i class="icon-chevron-right"></i> List View</a>
                </li>
                <li <?php if($actionId == 'create') echo 'class="active"'; ?>>
                    <a href="<?php echo $this->createUrl('create')?>">
                        <i class="icon-chevron-right"></i> Add New</a>
                </li>
            </ul>
            */?>

            <?php
            if($this->menu != null)
                $this->widget('application.views.widgets.SideNav', array('menus'=>$this->menu));
            else
                $this->widget('application.views.widgets.SideNav');
            ?>

        </td>
        <td style="width:25px"></td>
        <td style="text-align:left;vertical-align: top">
            <!-- div id="content" -->
            <?php echo $content; ?>
            <!-- /div --><!-- content -->
        </td>
    </tr>
</table>

<?php $this->endContent(); ?>
