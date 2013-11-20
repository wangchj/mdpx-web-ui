<?php

defined('TempIntId') or define('TempIntId', 1);

class SetupPartsController extends Controller
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
				'actions'=>array('index','view','vesselSetupPartsList','create','update','delete'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($vesselSetupId, $parent)
	{
		$setupPart=new SetupParts;
        $setupCam = new SetupCameras;
        $setupProbe = new SetupProbes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $setupPart->vesselSetupId = $vesselSetupId;
        $setupPart->parent = $parent;

		if(isset($_POST['SetupParts']) && $this->actionCreatePostBack($vesselSetupId, $parent, $setupPart, $setupCam, $setupProbe))
		{
            if(isset($_GET['retUrl']))
                $this->redirect($_GET['retUrl']);
            else
                $this->redirect(array('view','id'=>$setupPart->setupPartId));
		}

		$this->render('create',array(
			'model'=>$setupPart, 'setupCam'=>$setupCam, 'setupProbe'=>$setupProbe
		));
	}
	
	/**
	 * Handles create action when the request is a post back.
	 *
	 * @param integer $vesselSetupId
	 * @param integer $parent
     * @param SetupParts $setupPart
     * @param SetupCameras $setupCam
     * @param SetupProbes $setupProbe
     * @return true if new record created successfully; false otherwise.
	 */
	private function actionCreatePostBack($vesselSetupId, $parent, $setupPart, $setupCam, $setupProbe)
	{
        $setupPart->attributes=$_POST['SetupParts'];
        $setupPart->vesselSetupId = $vesselSetupId;
        if($setupPart->parent != '')
            $setupPart->parent = $parent;
        
        //If the part is a camera (serial num starts with 35-01)
        if($setupPart->isCamera())
        {
            $setupCam->setupPartId = TempIntId;
            $setupCam->attributes = $_POST['SetupCameras'];
            if($setupPart->validate() && $setupCam->validate() && $setupPart->save())
            {
                $setupCam->setupPartId = $setupPart->setupPartId;
                if($setupCam->save())
                    return true;
            }
        }
        //If the part is a probe (serial num starts with 30)
        else if($setupPart->isProbe())
        {
            $setupProbe->setupPartId = TempIntId;
            $setupProbe->attributes = $_POST['SetupProbes'];
            if($setupPart->validate() && $setupProbe->validate() && $setupPart->save())
            {
                $setupProbe->setupPartId = $setupPart->setupPartId;
                if($setupProbe->save())
                    return true;
            }
        }
        else
        {
            if($setupPart->validate() && $setupPart->save())
                return true;
        }
        
        return false;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$setupPart=$this->loadModel($id);
        $setupCam = SetupCameras::model()->find("setupPartId=$id");
        $setupProbe = SetupProbes::model()->find("setupPartId=$id");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SetupParts']) &&
            $this->actionUpdatePostBack($setupPart, $setupPart->isCamera() ? $setupCam : $setupProbe))
		{
            if(isset($_GET['retUrl']))
                $this->redirect($_GET['retUrl']);
            else
                $this->redirect(array('view','id'=>$setupPart->setupPartId));
		}

		$this->render('update',array(
			'model'=>$setupPart, 'setupCam'=>$setupCam, 'setupProbe'=>$setupProbe
		));
	}

    /**
     * Handles setup part update post back.
     *
     * @param SetupParts $setupPart The setup part.
     * @param mixed $auxPart the auxiliary information of a part. For example, if the setup part is a
     * camera, then an instance of SetupCameras class should be passed in as auxPart. Similarly, if
     * the setup part is a probe, then an instance of SetupProbes should be passed in.
     * @return true if model saved successfully; false otherwise.
     */
    private function actionUpdatePostBack($setupPart, $auxPart)
    {
        //Currently not allow updating part field
        //$setupPart->part = $_POST['SetupParts']['part'];

        $setupPart->port = $_POST['SetupParts']['port'];

        if($setupPart->isCamera() || $setupPart->isProbe())
        {
            $auxPart->attributes = $setupPart->isCamera() ? $_POST['SetupCameras'] : $_POST['SetupProbes'];
            if($setupPart->validate() && $auxPart->validate() && $setupPart->save() && $auxPart->save())
                return true;
        }
        else if($setupPart->save())
        {
            return true;
        }
        return false;
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$setupPart = $this->loadModel($id);
        if($setupPart->isCamera())
            $setupPart->setupCameras->delete();
        if($setupPart->isProbe())
            $setupPart->setupProbes->delete();

        $setupPart->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model=new SetupParts('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['SetupParts']))
            $model->attributes=$_GET['SetupParts'];

        $this->render('admin',array(
            'model'=>$model,
        ));
	}

    public function actionVesselSetupPartsList($vesselSetupId)
    {
        $model=new SetupParts('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['SetupParts']))
            $model->attributes=$_GET['SetupParts'];
        $model->vesselSetupId = $vesselSetupId;

        $this->render('vesselSetupPartsList',array(
            'model'=>$model,
        ));
    }

	/**
	 * Manages all models.
	 */
	//public function actionAdmin()
	//{
	//	$model=new SetupParts('search');
	//	$model->unsetAttributes();  // clear any default values
	//	if(isset($_GET['SetupParts']))
	//		$model->attributes=$_GET['SetupParts'];
//
	//	$this->render('admin',array(
	//		'model'=>$model,
	//	));
	//}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SetupParts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SetupParts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SetupParts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='setup-parts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
