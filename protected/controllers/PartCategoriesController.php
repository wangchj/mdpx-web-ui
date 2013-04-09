<?php

class PartCategoriesController extends Controller
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
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','treeview','create','update','delete','admin'),
				'users'=>array('@'),
			),
			//array('allow', // allow admin user to perform 'admin' and 'delete' actions
			//	'actions'=>array('admin','delete'),
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
	public function actionCreate()
	{
		$model=new PartCategories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PartCategories']))
		{
			$model->attributes=$_POST['PartCategories'];
			if($model->save())
				$this->redirect(Yii::app()->baseUrl.'/index.php/PartCategories');
		}

        if(isset($_GET['parent']))
            $model->parent = $_GET['parent'];
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

		if(isset($_POST['PartCategories']))
		{
			$model->attributes=$_POST['PartCategories'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->partCatId));
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
        //if($this->categoryHasChildren($id))
        //    throw new Exception('Category cannot be deleted because it contains child categories.');
        //else
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
		$dataProvider=new CActiveDataProvider('PartCategories');

        $model=new PartCategories('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['PartCategories']))
            $model->attributes=$_GET['PartCategories'];

		$this->render('index',array(
			'dataProvider'=>$dataProvider, 'tree'=>$this->buildCategoryTree(), 'model'=>$model
		));
	}

    public function actionTreeView()
    {
        $this->render('treeview',array(
            'tree'=>$this->buildCategoryTree()
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PartCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PartCategories']))
			$model->attributes=$_GET['PartCategories'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PartCategories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PartCategories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PartCategories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='part-categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Builds the entire category tree from database.
	 * @return an array that contains an array for each subcategory.
	 */
	public function buildCategoryTree()
	{
		$tree = array();
		$cats = PartCategories::model()->findAll();
		foreach($cats as $cat)
		{
			if($cat->parent == null)
			{
				$tree[] = $this->makeNode($cat);
			}
			else
			{
				if(!$this->insertIntoTree($tree, $cat))
					throw new Exception("PartCategoriesController->buildCategoryTree(): failed inserting category.");
			}
		}
		return $tree;
	}
	
	/**
	 * 
	 * @param array $nodes
	 * @param PartCategories $catToInsert
	 * @return boolean true if insert success; false otherwise.
	 */
	private function insertIntoTree(array &$nodes, PartCategories $catToInsert)
	{
		foreach($nodes as &$node)
		{
			if($node['id'] == $catToInsert->parent)
			{
				$node['children'][] = $this->makeNode($catToInsert);
				return true;
			}
			if($node['isGroup'])
			{
				if($this->insertIntoTree($node['children'], $catToInsert))
					return true;
			}
		}
		
		//This should not be reached.
		return false;
	}
	
	private function makeNode(PartCategories $cat)
	{
		if($cat == null || !isset($cat))
			throw new Exception('makeNode(): PartCategories is null.');
		
		$result = array(
				'id'=>$cat->partCatId,
				'name'=>$cat->name,
				'isGroup'=>$cat->isGroup,
                'children'=>array()
				);
		
		//if($cat->isGroup == 1)
		//	$result['children'] = array();
		
		return $result;
	}

    /**
     * @param $id the id of the part category to be checked.
     * @return bool true if part category has children; false otherwise.
     */
    private function categoryHasChildren($id)
    {
        $children = PartCategories::model()->findAll("parent=$id");
        if(count($children) < 0)
            return true;
        return false;
    }
}
