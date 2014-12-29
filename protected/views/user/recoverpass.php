<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<h1> Recuperar contraseña</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recover-form',
	"method"=>"post",
	'focus'=>array($model,'email_user'),
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40,'required'=>'required' )); ?>
		<?php echo $form->error($model,'email_user'); ?>
	</div>

	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Save'); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div>