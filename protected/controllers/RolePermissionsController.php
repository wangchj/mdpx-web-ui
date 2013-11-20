<?php

class RolePermissionsController extends Controller
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
			array('allow', // allowed for authenticated users
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
//	public function actionView($id)
//	{
//        $perm = new RolePermissions();
//        $perm->unsetAttributes();
//        $perm->roleId = $id;
//
//		$this->render('view',array(
//			'model'=>$this->loadModel($id),
//            'perm'=>$perm,
//		));
//	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $roleId ID of the role.
	 */
	public function actionCreate($roleId)
	{
		$model=new RolePermissions;
        $model->roleId = $roleId;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RolePermissions']))
		{
			$model->attributes=$_POST['RolePermissions'];
            $model->roleId = $roleId;
			if($model->save())
				$this->redirect(array('roles/view','id'=>$model->roleId));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $roleId the ID of the role.
     * @param string $controllerId Application controller identifier.
     * @param string $actionId controller action identifier.
	 */
	public function actionUpdate($roleId, $controllerId, $actionId)
	{
		$model=$this->loadModel($roleId, $controllerId, $actionId);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RolePermissions']))
		{
			$model->attributes=$_POST['RolePermissions'];
            $model->roleId = $roleId;
			if($model->save())
				$this->redirect(array('roles/view','id'=>$model->roleId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $roleId the ID of the role.
     * @param string $controllerId Application controller identifier.
     * @param string $actionId controller action identifier
	 */
	public function actionDelete($roleId, $controllerId, $actionId)
	{
		$this->loadModel($roleId, $controllerId, $actionId)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
//	public function actionIndex()
//	{
//        $model=new Roles('search');
//        $model->unsetAttributes();  // clear any default values
//        if(isset($_GET['Roles']))
//            $model->attributes=$_GET['Roles'];
//
//        $this->render('admin',array(
//            'model'=>$model,
//        ));
//	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//		$model=new Roles('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Roles']))
//			$model->attributes=$_GET['Roles'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
     * @param integer $roleId the ID of the role.
     * @param string $controllerId Application controller identifier.
     * @param string $actionId controller action identifier
	 * @return Roles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($roleId, $controllerId, $actionId)
	{
		$model=RolePermissions::model()->findByPk(
            array(
                array('roleId'=>$roleId, 'controllerId'=>$controllerId, 'actionId'=>$actionId)
            )
        );

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Roles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='roles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
