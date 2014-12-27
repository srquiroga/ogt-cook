<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body  <?php  if ($this->backgroundBody!=null) echo "class='".$this->backgroundBody."'"   ?> >

<div class="container" id="page">

	<div id="header">
		<div id="logo"><h1><a href="<?php echo yii::app()->createAbsoluteUrl("site/index") ?> "><?php echo CHtml::encode(Yii::app()->name); ?>  </a></h1> </div>
	</div><!-- header -->

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
