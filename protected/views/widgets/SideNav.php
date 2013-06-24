<?php
/**
 * CSideNav class file.
 *
 * @author Jeff Wang <wangchj@auburn.edu>
 */
 
class SideNav extends CWidget
{

    public $menus = array(
        array(
            //Label, action ID
            array('Grid View', 'index'),
            array('List View', 'list'),
            array('Add New', 'create')
        )
    );

	public function run()
	{
        foreach($this->menus as $menu)
        {
            $this->renderMenu($menu);
        }
	}

    private function renderMenu($menu)
    {
        echo '<ul class="nav nav-list bs-docs-sidenav">';

        foreach($menu as $item)
            $this->renderItem($item);

        echo '</ul>';
    }

    private function renderItem($item)
    {
        //Print <li> start tag
        echo '<li';
        if($this->controller->action->id == $item[1])
            echo ' class="active"';
        echo '>';

        //Print <a href=... >
        echo '<a href="';
        echo $this->controller->createUrl($item[1]);
        echo '">';

        //Print <i ..></i>
        echo '<i class="icon-chevron-right"></i>';

        //Print label and </li> end tag
        echo $item[0];
        echo '</a></li>';
    }

    public function init()
    {
        if($this->controller->id == 'partCategories')
            $this->menus = array(
                array(
                    //Label, action ID
                    array('Grid View', 'index'),
                    array('Tree View', 'treeview'),
                    array('List View', 'list'),
                    array('Add New', 'create')
                )
            );
        else
            $this->menus = array(
                array(
                    //Label, action ID
                    array('Grid View', 'index'),
                    array('List View', 'list'),
                    array('Add New', 'create')
                )
            );
    }
}
