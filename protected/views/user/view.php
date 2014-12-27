<?php
$this->menu=array(
	

	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar su cuenta?')),

);
?>

<h1>Cocina de <?php echo $model->nick_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

		'name_user',
		'last_name_user',
		'nick_user',
		'email_user',
		'birthday_user',
		'date_register',
		'points_user',
		
	),
)); ?>
