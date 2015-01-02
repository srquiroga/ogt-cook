<?php
/* @var $this RecipeController */
/* @var $model Recipe */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title_recipe'); ?>
		<?php echo $form->textField($model,'title_recipe',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_recipe'); ?>
		<?php echo $form->textField($model,'author_recipe',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'season_recipe'); ?>
		<?php echo $form->textField($model,'season_recipe',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_recipe'); ?>
		<?php echo $form->textField($model,'category_recipe',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_recipe'); ?>
		<?php echo $form->textField($model,'time_recipe',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingredients_recipe'); ?>
		<?php echo $form->textField($model,'ingredients_recipe',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'making_recipe'); ?>
		<?php echo $form->textField($model,'making_recipe',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valoration_recipe'); ?>
		<?php echo $form->textField($model,'valoration_recipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_register_recipe'); ?>
		<?php echo $form->textField($model,'date_register_recipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extras_recipe'); ?>
		<?php echo $form->textField($model,'extras_recipe',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_person_recipe'); ?>
		<?php echo $form->textField($model,'number_person_recipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_kitchen_recipe'); ?>
		<?php echo $form->textField($model,'type_kitchen_recipe',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times_vote_recipe'); ?>
		<?php echo $form->textField($model,'times_vote_recipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tag_type_recipe'); ?>
		<?php echo $form->textField($model,'tag_type_recipe',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tag_extra'); ?>
		<?php echo $form->textField($model,'tag_extra',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->