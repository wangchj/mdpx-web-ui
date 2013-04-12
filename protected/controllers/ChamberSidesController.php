<?php
Yii::import('application.controllers.PartCategoriesController');

class ChamberSidesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
			//array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array('index','view'),
			//	'users'=>array('*'),
			//),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
			),
			//array('allow', // allow admin user to perform 'admin' and 'delete' actions
			//	'actions'=>array('delete'),
			//	'users'=>array('admin'),
			//),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($chamberType, $sideId)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($chamberType, $sideId),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($chamberType)
	{
        //if(intvalue($chamberType) == 0) //If cannot convert to int, which returns 0
        //    throw new CHttpException(404,'The requested page does not exist 1.');

		$model=new ChamberSides;
        $model->chamberType = $chamberType;

        //Get the next side number for the chamber
        $nextLargerSide = ChamberSides::getNextLargerSideNum($chamberType);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        //If this is a post back, create a new model object and save to database.
		if(isset($_POST['ChamberSides']))
		{
			$model->attributes=$_POST['ChamberSides'];
            $model->chamberType = $chamberType;
            $model->sideId = $nextLargerSide;

			if($model->save())
                $this->redirect(array('chambers/view', 'id'=>$chamberType));
		}

        //If this is not a post back, display the view.

		$this->render('create',array(
			'model'=>$model, 'nextLargerSide'=>$nextLargerSide
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $chamberType the part category id of the chamber.
     * @param integer $sideId the side number.
     */
	public function actionUpdate($chamberType, $sideId)
	{
		$model=$this->loadModel($chamberType, $sideId);

        //Get the next side number for the chamber
        $nextLargerSide = ChamberSides::getNextLargerSideNum($chamberType);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChamberSides']))
		{
			$model->attributes=$_POST['ChamberSides'];
			if($model->save())
				$this->redirect(array('chambers/view','id'=>$chamberType));
		}

		$this->render('update',array(
			'model'=>$model,'nextLargerSide'=>$nextLargerSide
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $chamberType the part category id of the chamber.
	 * @param integer $sideId the side number.
	 */
	public function actionDelete($chamberType, $sideId)
	{
		$this->loadModel($chamberType, $sideId)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Parts');
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//));

        $model=new ChamberSides('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ChamberSides']))
            $model->attributes=$_GET['ChamberSides'];

        $this->render('admin',array(
            'model'=>$model,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Parts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Parts']))
			$model->attributes=$_GET['Parts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
     * @param integer $chamberType the part category id of the chamber.
     * @param integer $sideId the side number.
	 * @return Parts the loaded model
	 * @throws CHttpException
	 */
	//public function loadModel($chamberTypeId, $sideId)
	//{
	//	$model=Parts::model()->findByPk(array('chamberType'=>$chamberTypeId, 'sideId'=>$sideId));
    public function loadModel($chamberType, $sideId)
    {
        $model=ChamberSides::model()->findByPk(
            array(
                array('chamberType'=>$chamberType, 'sideId'=>$sideId)
            )
        );
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Parts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='parts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
