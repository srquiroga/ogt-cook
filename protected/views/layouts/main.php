<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"/>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
        <script type="text/javascript" src="<?php echo yii::app()->request->baseUrl; ?>/js/main.js"></script> 

	
</head>

<body  <?php  if ($this->backgroundBody!=null) echo "class='".$this->backgroundBody."'" ?> >

<div  id="page" class='hidden dBlock'>

	<div id="header">
            <div id="mainmenu" class='dBlock w100'>

                
        <?php $this->widget('zii.widgets.CMenu', array(
            'encodeLabel' => false,
            'htmlOptions'=>array('class'=>'navbar'),
            'submenuHtmlOptions'=>array('id'=>'subNav'),
            
              'items'=>array(
                
                array(
                    'label'=>'<button id ="aa" >Menu</button>',
                    'items'=>array(
                                array('label'=>'INICIO', 'url'=>array('site/index'), 'linkOptions'=>array('class'=>'w100 dBlock'), ),
				array('label'=>'CONTACTO', 'url'=>array('site/contact',), 'linkOptions'=>array('class'=>'w100 dBlock'), ),
				array('label'=>'REGISTRO', 'url'=>array('user/create'),'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=> 'RECETAS', 'url'=>array('recipe/index/'),'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=> 'PERFIL', 'url'=>array('user/view/','id'=> yii::app()->user->id ),'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'LOGIN', 'url'=>array('/site/login'), 'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'PANEL DE CONTROL', 'url'=>array('/user/admin'), 'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>Yii::app()->user->id==1),
				array('label'=>'LOGOUT ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'linkOptions'=>array('class'=>'w100 dBlock'), 'visible'=>!Yii::app()->user->isGuest)
			),
                )
            )
        ))?>        
         
                
               
	</div><!-- mainmenu -->
        <div id="logo" class="hidden dBlock w100"><h1 class="hidden dBlock w100"><a class='enlaceSin hidden dBlock' href="<?php echo yii::app()->createAbsoluteUrl("site/index") ?> "><span class="fueraFlujo"><?php echo CHtml::encode('OGT-COOK'); ?> </span>   </a></h1> </div>
	</div><!-- header -->

	
	
      
           
            <?php echo $content; ?>
       
        

	

	<div class="clear"></div>

        <div id="footer" class="w100 dBlock">
		Copyright &copy; <?php echo date('Y'); ?> one great team software.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->
      

</div><!-- page -->
    

    
</body>
</html>
