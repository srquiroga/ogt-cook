<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-form',
        'method'=>'post',
        'focus'=>array($model,'title_recipe'),
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>
        <div class="row">
		<?php echo $form->labelEx($model,'title_recipe'); ?>
                <?php echo $form->error($model,'title_recipe'); ?>
		<?php echo $form->textField($model,'title_recipe',array('size'=>50,'maxlength'=>50, 'class'=>'clear dBlock')); ?>
		
	</div>
    
        <div class="row">
		<?php echo $form->labelEx($model,'season_recipe'); ?>
		<?php echo $form->dropDownList($model,'season_recipe',array(''=>'', 'winter'=>'Invierno', 'spring'=>'Primavera', 'summer'=>'Verano', 'automn'=>'otoño','year'=>'Todo el año',  )); ?>
		<?php echo $form->error($model,'season_recipe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_recipe'); ?>
		<?php echo $form->dropDownList($model,'category_recipe',array(''=>'', 'pasta'=>'Pasta', 'verdura'=>'Verdura', 'ensaladas'=>'Ensaladas', 'vegetariano'=>'Vegetariano','vegana'=>'Vegana',
		                                                                      'ternera'=>'Ternera', 'pescado'=>'Pescado', 'cerdo'=>'Cerdo', 'legumbre'=>'Legumbre', 'aves'=>'Aves', 'fruta'=>'Fruta'  
		                                                                        )); ?>
		<?php echo $form->error($model,'category_recipe'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'tag_type_recipe'); ?>
            <?php echo $form->dropDownList($model,'tag_type_recipe',array(''=>'', 'plato unico'=>'Plato unico', 'primer plato'=>'Primer plato', 'segundo plato'=>'Segundo plato', 
                                                                                                                                                             'postre'=>'Postre','entrante'=>'Entrante', 'desayuno'=>'Desayuno', 'merienda'=>'Merienda', 'tapa'=>'Tapa' )); ?>
            <?php echo $form->error($model,'tag_type_recipe'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'tag_extra'); ?>
		<?php echo $form->dropDownList($model,'tag_extra',array(''=>'', 'cualquier ocacion'=>'Cualquier ocación', 'navidad'=>'Navidad', 'halloween'=>'Halloween', 'poco dinero'=>'Poco Dinero', 
																		'mucho dinero'=>'Mucho dinero','Dieta'=>'Dieta', 'engordar'=>'Engordar', 'cena romantica'=>'Cena romantica', 
																		'ideal niños'=>'Ideal niños', 'operacion bikini'=>'Operación bikini', 'sorprender'=>'Sorprender', )); ?>
		<?php echo $form->error($model,'tag_extra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_recipe'); ?>
		<?php echo $form->dropDownList($model,'time_recipe',array(''=>'', '0-10'=>'0-10 min','10-20'=>'10-20 min','20-30'=>'20-30 min','30-40'=>'30-40 min','40-50'=>'50-60 min','50-60'=>'60 + min ', )); ?>
		<?php echo $form->error($model,'time_recipe'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'number_person_recipe'); ?>
		<?php echo $form->dropDownList($model,'number_person_recipe', array(''=>'', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '5+'=>'5+', )); ?>
		<?php echo $form->error($model,'number_person_recipe'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'type_kitchen_recipe'); ?>
		<?php echo $form->dropDownList($model,'type_kitchen_recipe', array(''=>'', 'cazuela'=>'Cazuela', 'sarten'=>'Sarten', 'horno'=>'Horno', 'microondas'=>'Microondas', 
                                                                                    'robot'=>'Robot de cocina', 'barbacoa'=>'Barbacoa', 'otro'=>'Otro' )); ?>
		<?php echo $form->error($model,'type_kitchen_recipe'); ?>
	</div>
    
        <div class='row ingredientes'>
            
            <div class='row'>
                <?php echo $form->labelEx($model,'ingredients_recipe', array('class'=>'clear w100 ')); ?>
                <?php echo $form->error($model,'ingredients_recipe') ?> 
            </div>
          
            <?php echo $form->labelEx($model, 'quantity' ) ?>
            <?php echo $form->textField($model, 'quantity', array('id'=>'quantityIngredient'))?>
            <?php echo $form->labelEx($model, 'measure') ?>
            <?php echo $form->dropDownList($model, 'measure', array('gr'=>'gr', 'kg'=>'kg', 'ml'=>'ml', 'L'=>'L', 'und'=>'und', 'cucharada'=>'cucharada','pizca'=>'pizca',
                                                                    'nuez'=>'nuez', 'taza'=>'taza'), array('id'=>'measureIngredients')) ?>    
          
          
         
            
            <?php echo $form->labelEx($model,'one_ingredient') ?>
            <?php echo $form->textField($model,'one_ingredient', array('id'=>'oneIngredient')) ?>
           
            <div class='row'>
                <input type='button' id='btnAddIngredients' value='mas' />
                <input type='button' id='btnRemoveIngredients' value='limpiar' />
                <input type='button' id='btnEditIngredients' value='editar' />
            </div> 
                
            
            <div class='row'> 
                <?php echo $form->textarea($model, 'ingredients_recipe', array('id'=>'areaIngredientes', 'readonly'=>'readonly')) ?>
                
            </div>
        </div>    
        
        <div class='row preparacion'>
            
            <?php echo $form->labelEx($model, 'making_recipe') ?>
             <?php echo $form->error($model,'making_recipe') ?>
            <div class='row'>
            <?php echo $form->textarea($model,'making_recipe') ?>
             </div>
                
        </div>
            
        
        
    
       
    
        <div class="row">
		<?php echo $form->labelEx($model,'extras_recipe'); ?>
                <?php echo $form->error($model,'extras_recipe'); ?>
		<?php echo $form->textarea($model,'extras_recipe',array('size'=>60,'maxlength'=>255, 'class'=>'dBlock')); ?>
		
	</div>
    
 

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Nueva' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->