<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta charset="UTF-8"/>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	
</head>

<body  <?php  if ($this->backgroundBody!=null) echo "class='".$this->backgroundBody."'"   ?> >

<div class="container" id="page">

	<div id="header">
            <div id="mainmenu">
	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'INICIO', 'url'=>array('site/index')),
				array('label'=>'CONTACTO', 'url'=>array('site/contact')),
				array('label'=>'REGISTRO', 'url'=>array('user/create'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=> 'PERFIL', 'url'=>array('user/view/','id'=> yii::app()->user->id ), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'LOGIN', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'LOGOUT ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
		<div id="logo"><h1><a href="<?php echo yii::app()->createAbsoluteUrl("site/index") ?> "><?php echo CHtml::encode(Yii::app()->name); ?>  </a></h1> </div>
	</div><!-- header -->

	
	

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
