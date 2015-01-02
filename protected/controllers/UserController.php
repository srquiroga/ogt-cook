<?php

class UserController extends Controller
{
    public $layout='//layouts/column2';
    
    public function actions()
    {
        return array(
                'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
                'transparent'=>true,

                ),

        );
    }

    public function filters()
    {
        return array(
            'accessControl'

        );
    }
    
    public function accessRules()
    {
        return array(
                array(
                    'allow',  
                    'actions'=>array('index'),
                    'users'=>array('@'),
                ),
                array(// allow authenticated user to perform 'create' and 'update' actions
                    'allow', 
                    'actions'=>array('create'),
                    'users'=>array('@'),
                ),
                array(
                    'allow',
                    'actions'=>array('update','view','delete'),
                    'users'=>array('@'),
                    'expression' => array($this, 'isOwner'),
                    ),	
                array(   // allow admin user to perform 'admin' and 'delete' actions
                    'allow',
                    'actions'=>array('admin','delete','view'),
                    'users'=>array('admin'),
                ),
                array(  // allow authenticated user to perform 'create' and 'update' actions
                    'allow', 
                    'actions'=>array('create', 'notification', 'active', 'recoverpass'),
                    'users'=>array('*'),
                ),
                array( // allow all users to perform 'index' and 'view' actions
                    'allow',  
                    'actions'=>array('captcha'),
                    'users'=>array('*'),
                ),
                array(// deny all users
                    'deny',  
                    'users'=>array('*'),
                ),
        );
    }
    
    public function isOwner($user, $rule)
    {
        $model = $this->loadModel($_GET['id']);
        return $user->id === $model->id;
    }


    public function actionView($id)
    {
        $this->render('view',array(
                'model'=>$this->loadModel($id),
        ));
    }


    public function actionCreate()
    {
            $model=new User;
            $this->layout='column1';
            Yii::app()->clientScript->registerMetaTag('Nuevo ususario, registro, cuenta', 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
            Yii::app()->clientScript->registerMetaTag('cree una cuenta en ogt-cook y disfrute de una aplicacion como nunca ha visto',
            'description', null, array('id'=>'description'), 'meta_description');
            $this->backgroundBody = 'nuevoUsuario form';
            $this->pageTitle="Nuevo usuario | ". Yii::app()->name;
            $this->performAjaxValidation($model);

            if(isset($_POST['User']))
            {
                    $model->attributes=$_POST['User'];
                    if($model->save())
                            try{
                            $subject="Confirmar registro en ". yii::app()->name."";
                            $message=$model->name_user ."<p> para confirmar su cuenta haga click en el siguiente enlace</p> ";
                            $message.="<a href='".yii::app()->createAbsoluteUrl('user/active', array('activation_code'=>$model->activation_code ) ). "'>Verificación</a>";
                            var_dump($message);


                            $mail = new MailSend;

                            $mail->sendMain(
                                            array(yii::app()->params['adminEmail'], yii::app()->name),
                                            array($model->email_user, $model->name_user),
                                            $subject,
                                            $message
                            );
                            Yii::app()->user->setFlash('new','Se ha enviado un mensaje con el codigo de activación a su cuenta de Correo ');
                            $this->redirect(array('notification',));

                            }catch(Exception $e){
                                    $this->redirect(array('user/create'));
                            }
            }

            $this->render('create',array(
                    'model'=>$model,
            ));
    }

    public function actionActive($activation_code){


        $model=User::model()->findByAttributes(array('activation_code'=>$activation_code,));


        if ( $model===null )
                throw new CHttpException(404,'No se puede activar un usuario que no existe');

        if($model->activation_code != $activation_code)
                throw new CHttpException(301,'Codigo erroneo');

        $model->activation_code=null;
        $model->active_user=1;

        if ( $model->save()) {

                $this->redirect(array('view','id'=>$model->id));
        }
        else{
            var_dump($model->getErrors());
            die();
        }

        $this->render('notification', array("model"=>$model, ) );


    }
    public function actionRecoverpass(){

        $model = new User;
        $this->layout='column1';
      

        if(isset($_POST['User'])){
            $model->attributes=$_POST['User'];
            $model=User::model()->findByAttributes(array('email_user'=>$model->email_user,));

            try {
                if ( $model != null ) {

                    $model->password_user= $model->recorver_password_user;
                    $subject="Recuperar contraseña ". yii::app()->name."";
                    $message=$model->name_user ." su nueva contaseña es  ";
                    $message.= $model->recorver_password_user;

                    $mail = new MailSend;

                    $mail->sendMain(
                        array(yii::app()->params['adminEmail'], yii::app()->name),
                        array($model->email_user, $model->name_user),
                        $subject,
                        $message
                    );

                    $model->recorver_password_user = $model->generaPass();
                    $model->password_user = sha1($model->password_user);

                    if($model->save()){
                        Yii::app()->user->setFlash('recover','se ha enviado un mensaje a su correo electronico con la nueva contraseña ');
                        $this->redirect(array('notification',));
                    }
                }
            }catch (Exception $e) {
                $this->redirect(array('notification'));
            }
                
        }

        $this->render('recoverpass', array("model"=>$model));

    }

    public function actionUpdate($id)
    {
        $this->backgroundBody ='update';
        $this->layout='column1';
        Yii::app()->clientScript->registerMetaTag('Actualiza datos', 'keywords', null, array('id'=>'keywords'), 'meta_keywords');
        Yii::app()->clientScript->registerMetaTag('Actualice sus datos de forma segura',
        'description', null, array('id'=>'description'), 'meta_description');
        $this->pageTitle="Modificar datos | ". Yii::app()->name;

        $model=$this->loadModel($id);
        $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];

            $model->password_user = sha1($model->new_password);
            if($model->save())
                    yii::app()->user->setFlash('update','Se han realizado los cambios en su perfil');
                    $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
                'model'=>$model,
        ));
    }


        public function actionDelete($id)
        {
            $this->loadModel($id)->delete();
            if(!isset($_GET['ajax']))
                 $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        public function actionIndex()
        {
                $dataProvider=new CActiveDataProvider('User');
                $this->render('index',array(
                        'dataProvider'=>$dataProvider,
                ));
        }
        public function actionNotification(){
                $this->render("notification");
        }


        public function actionAdmin()
        {
            $model=new User('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['User']))
                    $model->attributes=$_GET['User'];

            $this->render('admin',array(
                    'model'=>$model,
            ));
        }

        public function loadModel($id)
        {
            $model=User::model()->findByPk($id);
            if($model===null)
                    throw new CHttpException(404,'The requested page does not exist.');
            return $model;
        }


        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }
        }
}
