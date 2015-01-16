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
				'actions'=>array('admin'),
				'users'=>array('*'),
			),
                        array('allow',
                                'actions'=>array('delete'),
                                'users'=>array('admin'),
                            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                     
		);
	}

	
	public function actionView($id)
	{
             $this->layout='column1';
             $title_recipe = $this->loadModel($id)->title_recipe;
             $category_recipe = $this->loadModel($id)->category_recipe;
             $tag_type_recipe = $this->loadModel($id)->tag_type_recipe;
             $author_recipe = $this->loadModel($id)->author_recipe;
             
                Yii::app()->clientScript->registerMetaTag( $title_recipe." , ". $category_recipe." , " . $tag_type_recipe , 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
                Yii::app()->clientScript->registerMetaTag($category_recipe,
                'description', null, array('id'=>'description'), 'meta_description');
                $this->backgroundBody = 'receta';
                $this->pageTitle=" $title_recipe  por $author_recipe  | ". Yii::app()->name;
            
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
                        $ingredientes = str_split($model->ingredients_recipe);
                        $extras = str_split($model->extras_recipe);
                        $preparacion = str_split($model->making_recipe);
                        $controlIngredientes = array_diff($ingredientes, $extras);
                        $controlPreparacion = array_diff($ingredientes, $preparacion);
                        
                        if($model->category_recipe !=="" ||$model->category_recipe !==null )
                            $user->points_user = $user->points_user+1; 
                        if($model->season_recipe !=="" || $model->season_recipe !== null)
                            $user->points_user = $user->points_user+1;
                        if($model->tag_type_recipe !=="" || $model->tag_type_recipe !== null)
                            $user->points_user = $user->points_user+1;
                        if($model->tag_extra !=="" || $model->tag_extra !==null)
                            $user->points_user = $user->points_user+1;
                        if($model->time_recipe !== ""|| $model->time_recipe !== null)
                            $user->points_user = $user->points_user+1;
                        if($model->number_person_recipe !== ""|| $model->number_person_recipe !==null)
                            $user->points_user = $user->points_user+1;
                        if($model->type_kitchen_recipe !== "" || $model->type_kitchen_recipe !== null)
                            $user->points_user = $user->points_user+1;
                        if(count($ingredientes)!== count($controlIngredientes))
                            $user->points_user = $user->points_user+1;
                        if(count($preparacion)!==count($controlPreparacion))
                             $user->points_user = $user->points_user+1;
                        
			if($model->save())
                                $user->save();
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
                $this->layout='column1';
                $model = new Recipe;
                $this->backgroundBody = 'listaRecetas';
            
                $dataProvider=new CActiveDataProvider($model );
		$this->render('index', 
                                array( 'dataProvider'=>$dataProvider)
                                
                        );
	}

	public function actionAdmin()
	{
            Yii::app()->clientScript->registerMetaTag('recetas, filtro, busqueda, titulo, ingrediente ,ogt-cook', 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
            Yii::app()->clientScript->registerMetaTag('Busque las distintas recetas que tiene la aplicacion y use los filtros para que sea mas facil',
            'description', null, array('id'=>'description'), 'meta_description');
            $this->backgroundBody = 'busquedaRecetas';
            $this->pageTitle="Busqueda | Recetas | ". Yii::app()->name;
            
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
