<?php

class AccountController extends Controller
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
				'actions'=>array('update','info','changePassword'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    /**
     * Page that displays user info.
     */
    public function actionInfo()
    {
        $model = Users::model()->findByPk(Yii::app()->user->id);
        $this->render('//users/view',array('model'=>$model));

    }

    /**
     * Action for user to change password.
     */
    public function actionChangePassword()
    {
        $model = new ChangePasswordForm;
        if(isset($_POST['ChangePasswordForm']))
        {
            $model->attributes = $_POST['ChangePasswordForm'];
            if($model->validate())
            {
                $userModel = Users::model()->findByAttributes(
                    array(
                        'userId'=>Yii::app()->user->id,
                        'password'=>Users::encryptPassword($model->oldPwd)
                    )
                );
                if($userModel != null)
                {
                    $userModel->password = Users::encryptPassword($model->newPwd);
                    $userModel->save(false);
                    Yii::app()->user->logout();
                    $this->redirect(array('login'));
                }
                else
                {
                    $model->addError('oldPwd', 'Password is incorrect');
                }

            }
        }
        $this->render('changePassword', array('model'=>$model));
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model = $this->loadModel(Yii::app()->user->id);

        //Postback
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
            $model->phone = Users::unformatPhone($model->phone);
			if($model->save())
				$this->redirect('info');
		}

        //Not postback
		$this->render('update',array('model'=>$model));
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
