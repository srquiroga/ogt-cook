<?php
/* @var $this RecipeController */
/* @var $data Recipe */
?>

<div class="view">


        
    <div>
    <h3><?php echo CHtml::link(CHtml::encode($data->title_recipe), array('view', 'id'=>$data->id)); ?></h3>
    </div>

    <div>
        <p> 
            <b><?php echo CHtml::encode($data->getAttributeLabel('author_recipe')); ?>:</b>
            <?php echo CHtml::encode($data->author_recipe); ?>
        </p>

    </div>
    
    <?php
       
        if(strlen($data->season_recipe)===0){    
          
        }else{
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('season_recipe')).": </b>";
            echo CHtml::encode($data->season_recipe);
            echo '</p> </div>';
        }    
    ?>
  <?php
       
        if(strlen($data->category_recipe)===0){    
          
        }else{
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('category_recipe')).": </b>";
            echo CHtml::encode($data->category_recipe);
            echo '</p> </div>';
        }    
    ?>
   
   <?php
       
        if(strlen($data->type_kitchen_recipe)===0){    
          
        }else{
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('type_kitchen_recipe')).": </b>";
            echo CHtml::encode($data->type_kitchen_recipe);
            echo '</p> </div>';
        }    
    ?>
    <?php
       
        if(strlen($data->tag_extra)===0){    
          
        }else{
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('tag_extra')).": </b>";
            echo CHtml::encode($data->tag_extra);
            echo '</p> </div>';
        }    
    ?>
    <?php
       
        if($data->number_person_recipe==="0"){    
          
        }else{
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('number_person_recipe')).": </b>";
            echo CHtml::encode($data->number_person_recipe);
            echo '</p> </div>';
        }    
    ?>
        
    <?php
       
        if(strlen($data->time_recipe)===0){    
          
        }else{
      
            echo '<div> <p> <b>';
            echo CHtml::encode($data->getAttributeLabel('time_recipe')).": </b>";
            echo CHtml::encode($data->time_recipe);
            echo '</p> </div>';
        }    
    ?>
    
       
            
          
      
  

 

   
    

   


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