<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form-update',
	'method'=>'post',
	'focus'=>array($model,'name_user'),
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>




	<div class="row">
		<?php echo $form->labelEx($model,'name_user'); ?>
		<?php echo $form->textField($model,'name_user',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name_user'); ?>
		<?php echo $form->textField($model,'last_name_user',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'last_name_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nick_user');?>
		<?php echo $form->textField($model,'nick_user',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nick_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_user'); ?>
		<?php echo $form->passwordField($model,'password_user',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'password_user'); ?>
		
		

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'repeat_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email_user'); ?>
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'guardar' : 'Save'); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div>
