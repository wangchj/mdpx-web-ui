<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * Checks if the current user has access to the operation defined by controller and action.
     * @param $route
     * @return boolean true if the current user has access to the operation;
     * false otherwise
     */
    public function hasAccess($route)
    {
        $userId = Yii::app()->user->id;
        $am = Yii::app()->accessManager;

        //No controller ID specified. Use current controller ID.
        if(!strpos($route, '/'))
        {
            return $am->hasAccess($userId, $this->id, $route);
        }
        else
        {
            $r = explode('/', $route);
            return $am->hasAccess($userId, $r[0], $r[1]);
        }
    }

    /**
     * Check if the current user has access to any of the operations specified.
     * @param array $routes a list of operations
     * @return bool true if user is allowed to access ANY of the operations; false
     * if none of the operations is allowed or $routes is empty.
     */
    public function hasAnyAccess($routes=array())
    {
        if(count($routes) == 0) return false;

        foreach($routes as $route)
            if($this->hasAccess($route))
                return true;

        return false;
    }
}