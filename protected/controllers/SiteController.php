<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
          
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
          
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    public function actionIndex() {
        Yii::app()->clientScript->registerMetaTag('recetas, cocina, gastronomia, ogt-cook ', 'keywords', null, array('id' => 'keywords'), 'meta_keywords');
        Yii::app()->clientScript->registerMetaTag('Con esta plicacion podra cocinar, divertirse, hacer amigos', 'description', null, array('id' => 'description'), 'meta_description');
        $this->backgroundBody = 'inicio';
        $this->pageTitle = "recetas cocina gastronomia | " . Yii::app()->name; 
         $this->layout = 'column1';
         
         /*$criteria = CDbCriteria;
         $criteria->compare('id',$this->id,true);*/
         $model =  Recipe::model();
         
         /*$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
		$this->render('index', 
                                array( 'dataProvider'=>$dataProvider)
                                
        );*/
     
        $this->render('index', array('model'=>$model));
      
       
    }
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

  
    public function actionContact() {
        $model = new ContactForm;
        $this->layout = 'column1';
        Yii::app()->clientScript->registerMetaTag('Contacto,', 'keywords', null, array('id' => 'keywords'), 'meta_keywords');
        Yii::app()->clientScript->registerMetaTag('Contacte con nosotros', 'description', null, array('id' => 'description'), 'meta_description');
        $this->backgroundBody = 'Contacto form';
        $this->pageTitle = "Contacto | " . Yii::app()->name;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

 
    public function actionLogin() {
        $model = new LoginForm;
        Yii::app()->clientScript->registerMetaTag('login, inicio sesion ', 'keywords', null, array('id' => 'keywords'), 'meta_keywords');
        Yii::app()->clientScript->registerMetaTag('login, inicio sesion', 'description', null, array('id' => 'description'), 'meta_description');
        $this->pageTitle = "Login | " . Yii::app()->name;
        $this->backgroundBody = 'login form';

      
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }


        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
       
            if ($model->validate() && $model->login())
                
                if ($model->username==="admin"){
                    $this->redirect(yii::app()->createAbsoluteUrl('user/admin'));
                }
                else{
                    $this->redirect(Yii::app()->user->returnUrl);
                }
                
                
        }
       
        $this->render('login', array('model' => $model));
    }

   
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
