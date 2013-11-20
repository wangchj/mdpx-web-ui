<?php

class UserRolesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete','createAll'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
     * Insert multiple roles for a user.
     * @param integer $userId database ID of the user.
     * @param string $roleIdStr a string containing the concatenation of roleIds in the format
     *          id1+id2..+idn. Example: 1+2+3
     */
    public function actionCreateAll($userId, $roleIdStr)
    {
        $list = explode(' ', $roleIdStr);

        foreach($list as $roleId)
        {
            if($roleId == '')
                continue;

            $result = new UserRoles();
            $result->userId = $userId;
            $result->roleId = $roleId;
            $result->save(false);
        }
    }

	/**
	 * Deletes a particular model.
	 * @param integer $userId the ID of the user.
     * @param integer $roleId the ID of the role.
	 */
	public function actionDelete($userId, $roleId)
	{
        $model = UserRoles::model()->findByAttributes(array('userId'=>$userId, 'roleId'=>$roleId));
		if($model != null)
            $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['retUrl']) ? $_POST['retUrl'] : array('users/index'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
