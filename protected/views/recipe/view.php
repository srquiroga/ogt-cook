<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Recipe', 'url'=>array('index')),
	array('label'=>'Create Recipe', 'url'=>array('create')),
	array('label'=>'Update Recipe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Recipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
);
?>

<h1>View Recipe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'title_recipe',
		'author_recipe',
		'season_recipe',
		'category_recipe',
		'time_recipe',
		'ingredients_recipe',
		'making_recipe',
		'valoration_recipe',
		'date_register_recipe',
		'extras_recipe',
		'number_person_recipe',
		'type_kitchen_recipe',
		'times_vote_recipe',
		'tag_type_recipe',
		'tag_extra',
	),
)); ?>
