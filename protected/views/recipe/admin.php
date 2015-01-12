<?php
/* @var $this RecipeController */
/* @var $model Recipe */

$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Recipe', 'url'=>array('index')),
	array('label'=>'Create Recipe', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recipe-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Recipes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'recipe-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'title_recipe',
		'ingredients_recipe',
                array(
                   'name'=>'season_recipe',
                   'value'=>'$data->season_recipe', 
                   'filter'=>CHtml::listData(Recipe::model()->findAll(), 'season_recipe', 'season_recipe'), 
                ),
                array(
                  'name'=>'tag_extra',
                  'value'=>'$data->tag_extra',
                  'filter'=>CHtml::listData(Recipe::model()->findAll(), 'tag_extra', 'tag_extra'),  
                ),
                array(
                    'name'=>'type_kitchen_recipe',
                    'value'=>'$data->type_kitchen_recipe',
                    'filter'=>CHtml::listData(Recipe::model()->findAll(), 'type_kitchen_recipe', 'type_kitchen_recipe'),
                ),
                array(
                    'name'=>'time_recipe',
                    'value'=>'$data->time_recipe',
                    'filter'=>CHtml::listData(Recipe::model()->findAll(), 'time_recipe', 'time_recipe'),    
                ),
                array(
                    'name'=>'tag_type_recipe',
                    'value'=>'$data->tag_type_recipe',
                    'filter'=>CHtml::listData(Recipe::model()->findAll(), 'tag_type_recipe', 'tag_type_recipe'),    
                ),
                array(
                    'name'=>'number_person_recipe',
                    'value'=>'$data->number_person_recipe',
                    'filter'=>CHtml::listData(Recipe::model()->findAll(), 'number_person_recipe', 'number_person_recipe'),    
                ),
                
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
                         'template'=>'{view}',
		),
	),
)); ?>
