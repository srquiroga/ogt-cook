<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_user'); ?>
		<?php echo $form->textField($model,'name_user',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name_user'); ?>
		<?php echo $form->textField($model,'last_name_user',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nick_user'); ?>
		<?php echo $form->textField($model,'nick_user',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birthday_user'); ?>
		<?php echo $form->textField($model,'birthday_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_register'); ?>
		<?php echo $form->textField($model,'date_register'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active_user'); ?>
		<?php echo $form->textField($model,'active_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'points_user'); ?>
		<?php echo $form->textField($model,'points_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activation_code'); ?>
		<?php echo $form->textField($model,'activation_code',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->