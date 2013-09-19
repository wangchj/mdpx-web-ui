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
     * @param $controllerId
     * @param $actionId
     * @return boolean true if the current user has access to the operation;
     * false otherwise
     */
    public function hasAccess($controllerId, $actionId)
    {
        $user = Yii::app()->user;
        $am = Yii::app()->accessManager;

        return $am->hasAccess($user->id, $controllerId, $actionId);
    }

    public function hasAnyAccess($routes=array())
    {
        if(count($routes) == 0) return false;

        foreach($routes as $route)
        {
            //No controller ID specified. Use current controller ID.
            if(!strpos($route, '/'))
            {
                if($this->hasAccess($this->id, $route))
                    return true;
            }
            else
            {
                $r = explode('/', $route);
                if($this->hasAccess($r[0], $r[1]))
                    return true;
            }
        }

        return false;
    }
}