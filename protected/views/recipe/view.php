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

<h2><?php echo $model->title_recipe. " por ".$model->author_recipe ?></h2>
<div class='recipeView'>
    
    <div class='ingredientsView'>
        <h3><?php echo $model->getAttributeLabel('ingredients_recipe') ?></h3>
         <?php /*echo $model->ingredients_recipe; */
        
        $ingredientes = preg_split('/\n/', $model->ingredients_recipe);
        array_pop($ingredientes);
        
        echo '<ul>';
        foreach ($ingredientes as $value) {
            
            echo '<li>'.$value.'</li>';
        }
        echo '</li>';      
        ?>        
    </div>
    
    <div class='tagView'>
        <h3>Etiquetas </h3>
        
        <table>
            
            <thead></thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <th>Temporada</th>
                    <td><?php echo $model->season_recipe ?> </td>
                </tr> 
                
                <tr>
                    <th>Categoria</th>
                    <td><?php echo $model->category_recipe ?> </td>
                </tr>
                
                <tr>
                    <th>Tipo de plato</th>
                    <td><?php echo $model->tag_type_recipe ?> </td>
                </tr>
                
                <tr>
                    <th>Pensada para </th>
                    <td><?php echo $model->tag_extra ?> </td>
                </tr>
                
                <tr>
                    <th>Tiempo de preparación</th>
                    <td><?php echo $model->time_recipe ?> min </td>
                </tr> 
                
                <tr>
                    <th>Numero de comenzales</th>
                    <td><?php echo $model->number_person_recipe ?> </td>
                </tr>
                
                <tr>
                    <th>Tipo de cocina</th>
                    <td><?php echo $model->type_kitchen_recipe ?> </td>
                </tr> 
                
            </tbody>
        </table>
    </div>
    
    <div class='makingView'>
        <h3>Preparación</h3>
        <p> <?php echo $model->making_recipe ?> </p>
    </div>
    
    <div class='extraView'>
        
        <h3>Extras</h3>
        <p><?php echo $model->extras_recipe ?> </p>
        
    </div>
    
    <div class='searchView'>
        <h3>Buscar mas recetas</h3>
        <a class="buscar" href="<?php echo yii::app()->createAbsoluteUrl('recipe/admin') ?>"> Busqueda de recetas</a>
        <a class="nueva" href="<?php echo yii::app()->createAbsoluteUrl('recipe/create') ?>">Nueva receta</a>
    </div>

</div>


