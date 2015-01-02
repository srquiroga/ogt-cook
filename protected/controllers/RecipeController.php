<?php

class RecipeController extends Controller
{
	
	public $layout='//layouts/column2';
        
      

	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	
	public function actionCreate()
	{
		$model=new Recipe;
                $this->layout='column1';
                Yii::app()->clientScript->registerMetaTag('Nuevo receta, ogt-cook', 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
                Yii::app()->clientScript->registerMetaTag('ogt-cook proporciona este espacio para que pueda crear sus nuevas recetas de forma facil',
                'description', null, array('id'=>'description'), 'meta_description');
                $this->backgroundBody = 'nuevaReceta form';
                $this->pageTitle="Nueva receta | ". Yii::app()->name;
                
                $id_user= yii::app()->user->id;
		
		$user = User::model()->findByPk($id_user);
	
                $this->performAjaxValidation($model);
		
                if(isset($_POST['Recipe']))
		{
			$model->attributes=$_POST['Recipe'];
                        $model->author_recipe = $user->nick_user;
			$model->id_user= $user->id;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		

		if(isset($_POST['Recipe']))
		{
			$model->attributes=$_POST['Recipe'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Recipe');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Recipe('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Recipe']))
			$model->attributes=$_GET['Recipe'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	
	public function loadModel($id)
	{
		$model=Recipe::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='recipe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
