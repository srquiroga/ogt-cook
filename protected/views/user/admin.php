<?php
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administrador de usuarios</h2>

<p>
Puede usar los siguientes operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) para obtener mejores resultados en sus busquedas.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name_user',
		'last_name_user',
		'nick_user',
		'password_user',
		'email_user',
		/*
		'birthday_user',
		'date_register',
		'active_user',
		'points_user',
		'recorver_password_user',
		'activation_code',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
