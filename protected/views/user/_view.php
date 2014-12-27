<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_user')); ?>:</b>
	<?php echo CHtml::encode($data->name_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name_user')); ?>:</b>
	<?php echo CHtml::encode($data->last_name_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nick_user')); ?>:</b>
	<?php echo CHtml::encode($data->nick_user); ?>
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('email_user')); ?>:</b>
	<?php echo CHtml::encode($data->email_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthday_user')); ?>:</b>
	<?php echo CHtml::encode($data->birthday_user); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_register')); ?>:</b>
	<?php echo CHtml::encode($data->date_register); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_user')); ?>:</b>
	<?php echo CHtml::encode($data->active_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('points_user')); ?>:</b>
	<?php echo CHtml::encode($data->points_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recorver_password_user')); ?>:</b>
	<?php echo CHtml::encode($data->recorver_password_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activation_code')); ?>:</b>
	<?php echo CHtml::encode($data->activation_code); ?>
	<br />

	*/ ?>

</div>