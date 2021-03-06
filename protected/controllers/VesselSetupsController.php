<?php

class VesselSetupsController extends Controller
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
				'actions'=>array('index','view','partsList','tree','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	public function actionView($id)
	{
        //Model for SetupCameras for searching
        //$cameras = new SetupCameras('search');
        //$cameras->vesselSetupId = $id;

        //Model for SetupProbes for searching
        //$probes = new SetupProbes('search');
        //$probes->vesselSetupId = $id;

        $model = VesselSetupsSum::model()->find('vesselSetupId='.$id);
		$this->render('view',array(
			'model'=>$model,
            //'cameras'=>$cameras,
            //'probes'=>$probes
		));
	}

    /**
     * Displays all parts of a Vessel Setup.
     * @param integer $id the ID of Vessel Setup.
     */
    public function actionPartsList($id)
    {
        $model = new SetupParts('search');
        $model->vesselSetupId = $id;

        $this->render('partsList',array(
            'model'=>$model,
            //'cameras'=>$cameras,
            //'probes'=>$probes
        ));
    }

    /**
     * @param $id ID of Vessel Setup.
     */
    public function actionTree($id)
    {
        $setupParts = SetupParts::model()->findAll("parent is NULL and vesselSetupId=$id");
        $this->render('tree', array('model'=>$this->loadModel($id),'setupParts'=>$setupParts));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new VesselSetups;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VesselSetups']))
		{
			$model->attributes=$_POST['VesselSetups'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->vesselSetupId));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VesselSetups']))
		{
			$model->attributes=$_POST['VesselSetups'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->vesselSetupId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

        $model=new VesselSetupsSum('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['VesselSetupsSum']))
            $model->attributes=$_GET['VesselSetupsSum'];

        $this->render('admin',array('model'=>$model));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VesselSetups('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VesselSetups']))
			$model->attributes=$_GET['VesselSetups'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VesselSetups the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=VesselSetups::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param VesselSetups $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vessel-setup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
