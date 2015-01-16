<h1>Modificar datos <?php echo $model->nick_user; ?></h1>

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
                <?php echo $form->error($model,'name_user'); ?>
		<?php echo $form->textField($model,'name_user',array('size'=>20,'maxlength'=>20, 'class'=>'clear dBlock')); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name_user'); ?>
                <?php echo $form->error($model,'last_name_user'); ?>
		<?php echo $form->textField($model,'last_name_user',array('size'=>30,'maxlength'=>30, 'class'=>'clear dBlock')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nick_user');?>
                <?php echo $form->error($model,'nick_user'); ?>
		<?php echo $form->textField($model,'nick_user',array('size'=>10,'maxlength'=>10, 'class'=>'clear dBlock')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_user'); ?>
                <?php echo $form->error($model,'password_user'); ?>
		<?php echo $form->passwordField($model,'password_user',array('size'=>40,'maxlength'=>40, 'class'=>'clear dBlock')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeat_password'); ?>
                <?php echo $form->error($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>40,'maxlength'=>40, 'class'=>'clear dBlock')); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'new_password'); ?>
                <?php echo $form->error($model,'new_password'); ?>    
		<?php echo $form->passwordField($model,'new_password',array('size'=>40,'maxlength'=>40, 'class'=>'clear dBlock')); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_user'); ?>
                <?php echo $form->error($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40, 'class'=>'clear dBlock')); ?>
		
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
                <?php echo $form->error($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode', array('class'=>'clear dBlock')); ?>
		</div>
		
	</div>
	<?php endif; ?>
	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'guardar' : 'Save'); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div>
