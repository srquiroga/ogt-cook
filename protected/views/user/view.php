<?php
$this->menu=array(
	

	array('label'=>'Modificar datos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Cuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro que desea eliminar su cuenta?')),

);
?>

<h2>Cocina de <?php echo $model->nick_user; ?></h2>
<div class="userView">
    <table>
        <thead></thead>
        <tfoot></tfoot>
        <tbody>
            <tr>
                <th>Nombre</th>
                <td><?php echo $model->name_user ?></td>
            </tr>
            
            <tr>
                <th>Apellido</th>
                <td><?php echo $model->last_name_user ?> </td>
            </tr>
            
            <tr>
                <th>Fecha de registro</th>
                <td> <?php echo $model->date_register ?></td>
            </tr>
            
            <tr>
                <th>Fecha de nacimiento</th>
                <td><?php echo $model->birthday_user ?> </td>
            </tr>
            
            <tr>
                <th>Puntos</th>
                <td><?php echo $model->points_user ?> </td>
            </tr>
        </tbody>
    </table>
    
</div>
