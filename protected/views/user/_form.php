<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'method'=>'post',
        'focus'=>array($model,'name_user'),
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>
<?php 
	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
	'id'=>'dialogNewUser',
	'options'=>array(
		'title'=>'Nuevo Usuario',
		"width"=>200,
		"height"=>200,
		"modal"=>true,
		"autoOpen"=>false,
		"overlay"=>array(
			"backgroundColor"=>"#000",
			"opacity"=>"0.5"	
			),
		),
	));
	?>
	<p>El nick solo puede ser creado con letras minúsculas, números y guiones bajos, con un maximo de 10 caracteres, pruebe a hacer disitintas combinaciones como: “nick”, “nick1”, “nick_1”</p>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'name_user'); ?>
                <?php echo $form->error($model,'name_user'); ?>
		<?php echo $form->textField($model,'name_user',array('size'=>20,'maxlength'=>20, 'class'=>'clear dBlock' )); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name_user'); ?>
                <?php echo $form->error($model,'last_name_user'); ?>
		<?php echo $form->textField($model,'last_name_user',array('size'=>30,'maxlength'=>30, 'class'=>'clear dBlock')); ?>
		
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'nick_user'); echo CHtml::link('i', '#', array('onclick'=>'$("#dialogNewUser").dialog("open"); return false;', "class"=>'aa' )); ;?>
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
		<?php echo $form->labelEx($model,'email_user'); ?>
                <?php echo $form->error($model,'email_user'); ?>
		<?php echo $form->textField($model,'email_user',array('size'=>40,'maxlength'=>40, 'class'=>'clear dBlock')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday_user'); ?>
                <?php echo $form->error($model,'birthday_user'); ?>
		<?php
		  	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		   'model'=>$model,
		   'attribute'=>'birthday_user',
		   'value'=>$model->birthday_user,
		   'language' => 'es',
		   'htmlOptions' => array('readonly'=>"readonly,"),
		   'options'=>array(
		    'autoSize'=>true,
		    'defaultDate'=>$model->birthday_user,
		    'dateFormat'=>'yy-mm-dd',
		    'buttonImageOnly'=>true,
		    'buttonText'=>'Fecha',
		    'selectOtherMonths'=>true,
		    'showAnim'=>'slide',
		    'showButtonPanel'=>true,
		    'showOn'=>'button', 
		    'showOtherMonths'=>true, 
		    'changeMonth' => true,
		    'changeYear' => true,
		    'yearRange'   => '1900:date()',
		    
		    ),
		  )); 
		?>
		
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode', array('class'=>'verifyCode')); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode', array('class'=>' clear dBlock') ); ?>
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'guardar' : 'Save'); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div>