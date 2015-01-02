jQuery(document).ready(function($) {
	

	$('#btnAddIngredients').click(function(event) {
		
         
            
                var cantidad = $('#quantityIngredient').val();
		var medida =$('#measureIngredients').val();
		var ingrediente =$('#oneIngredient').val();

		var cadena = cantidad + ' ' +medida+' '+ingrediente+'\n';

		$('#areaIngredientes').append(cadena);

		$('#quantityIngredient').val("");
		$('#measureIngredients').val("");
		$('#oneIngredient').val("");
		$('#quantityIngredient').focus();


	});

	$('#btnRemoveIngredients').click(function(event) {
		$('#areaIngredientes').text('');
	});
        
        /*$('#btnEditIngredients').click(function(event){
   
            $('#areaIngredientes').removeAttr('readonly');
        });*/

});


