<?php
/* @var $this RecipeController */
/* @var $data Recipe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->title_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->author_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('season_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->season_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->category_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->time_recipe); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ingredients_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->ingredients_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('making_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->making_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valoration_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->valoration_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_register_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->date_register_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('extras_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->extras_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_person_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->number_person_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_kitchen_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->type_kitchen_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('times_vote_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->times_vote_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_type_recipe')); ?>:</b>
	<?php echo CHtml::encode($data->tag_type_recipe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_extra')); ?>:</b>
	<?php echo CHtml::encode($data->tag_extra); ?>
	<br />

	*/ ?>

</div>