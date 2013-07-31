<?php
/**
 * CSideNav class file.
 *
 * @author Jeff Wang <wangchj@auburn.edu>
 */
 
class SideNav extends CWidget
{

    public $accessManager;

    /**
     * An array of array of arrays. Each array represents a menu. Each inner-most
     * array represents a menu item, composes of a set of name=>value. 'params
     * denotes addition GET parameters.
     *
     * Each menu entry has the following parts:
     * - label: label to be displayed.
     * - route: the controller/action route to generate menu URL.
     * - params: GET parameters for the menu URL.
     *
     * @example
     * $menus = array(
     *     //Menu 1
     *     array(
     *         array('label'=>'Home', 'route'=>'site/index'),
     *         array('label'=>'List View', 'route'=>'list'),
     *         array('label'=>'Add New', 'route'=>'create', 'params'=>array('id'=>1))
     *     ),
     *     //Menu 2
     *     array(
     *         ...
     *     ),
     * );
     *
     * @var array An array of arrays. Each array represents a menu. Each item of the
     * inner most array represent a menu item.
     */
    public $menus;

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
        //If user does not have permission to access this item, stop rendering.
        if(!$this->accessManager->hasAccess(Yii::app()->user->id, $this->controller->id,
            $item['route']))
            return;

        //Print <li> start tag
        echo '<li';
        if((!strpos($item['route'], '/') && $this->controller->action->id == $item['route']) ||
            $item['route'] == $this->controller->route)
            echo ' class="active"';
        echo '>';

        //Print <a href=... >
        echo '<a href="';
        echo $this->controller->createUrl($item['route'], isset($item['params']) ? $item['params']:array());
        echo '">';

        //Print <i ..></i>
        echo '<i class="icon-chevron-right"></i>';

        //Print label and </li> end tag
        echo $item['label'];
        echo '</a></li>';
    }

    public function init()
    {
        $this->accessManager = Yii::app()->accessManager;
        if($this->menus == null)
            $this->createMenu();
    }


    public function createMenu()
    {
        switch($this->controller->id)
        {
            case 'partCategories':
                $this->menus = array(
                    array(
                        array('label'=>'Grid View', 'route'=>'index'),
                        array('label'=>'Tree View', 'route'=>'treeview'),
                        array('label'=>'List View', 'route'=>'list'),
                        array('label'=>'Add New', 'route'=>'create')
                    )
                );
                break;
            case 'roles':
            case 'rolePermissions':
                $this->createMenuRoles();
                break;

            default:
                $this->menus = array(
                    array(
                        array('label'=>'Grid View', 'route'=>'index'),
                        array('label'=>'List View', 'route'=>'list'),
                        array('label'=>'Add New', 'route'=>'create')
                    )
                );
        }
    }

    private function createMenuRoles()
    {
        $this->menus = array(
            array(
                array('label'=>'Roles', 'route'=>'roles/index'),
                array('label'=>'Add New Role', 'route'=>'roles/create')
            )
        );


//        if($this->controller->action->id == 'view' || $this->controller->id == 'rolePermissions')
//            $this->menus[] =
//                array(
//                    array('label'=>'Permissions', 'route'=>'roles/view',  'params'=>array('id'=>$this->controller->actionParams['id'])),
//                    array('label'=>'Update Permission', 'route'=>'rolePermissions/update',  'params'=>$this->controller->actionParams),
//                    array('label'=>'Add Permission', 'route'=>'rolePermissions/create',)
//                );
    }
}
