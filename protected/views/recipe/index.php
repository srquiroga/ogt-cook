<?php
/* @var $this RecipeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recipes',
);

$this->menu=array(
	array('label'=>'Create Recipe', 'url'=>array('create')),
	array('label'=>'Manage Recipe', 'url'=>array('admin')),
);
?>



<h1>Recetas</h1>

<div class='searchView'>
    
    <a class="buscar" href="<?php echo yii::app()->createAbsoluteUrl('recipe/admin') ?>"> buscar recetas</a>
    <a class="nueva" href="<?php echo yii::app()->createAbsoluteUrl('recipe/create') ?>">Nueva receta</a>
</div>

<div class="listView hidden dBlock">
    <?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>

