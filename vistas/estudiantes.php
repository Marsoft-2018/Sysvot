<?php 
	$obj = new Student();
?>
<script src="complementos/DataTables/datatables.js"></script>
<script type="application/javascript">
    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );
</script>
<h1>ALUMNOS REGISTRADOS</h1><a href='#' class='btn btn-primary' onclick='ventanaNuevoAlumno()'><i class='fa fa-plus-circle'> Agregar Alumno </i></a>
<table class='table table-striped tarjeton' style='width:70%;' id='tablaAlumnos'>
	<thead>    
        <tr class='TITULO' BGCOLOR='#00005B'>
            <th>Código</th>
            <th>Grado</th>
            <th>Nombre Completo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
    		foreach ($obj->listar() as $value) { ?>
    		<tr>
    			<td><?php echo $value['id'] ?></td>
    			<td><?php echo $value['grade']."°" ?></td>
    			<td><?php echo $value['firstName']." ".$value['secondName']." ".$value['firstLastName']." ".$value['secondLastName'] ?></td>
    			<?php if ($value['status'] == "Ya voto"){ ?>
    				<td><span class='btn btn-default'><?php echo $value['status'] ?></span></td>
                	<td><a href='#' class='btn btn-default' title='Editar datos del Student' style='color:#cecece;'><i class='fa fa-pencil'> </i></a></td>
                	<td><a href='#' class='btn btn-default' style='color:#cecece;' title='Elimina el registro del Student de la base da datos'><i class='fa fa-trash-o'> </i></a></td>
                <?php }else{ ?>
                	<td>
                		<span class='btn btn-warning'><?php echo $value['status'] ?></span>
                	</td>
                	<td>
                		<a href='#' class='btn btn-success' title='Editar datos del Student' id='<?php echo $value['id'] ?>' onclick='ventanaEditarAlumno(this.id)'>
                			<i class='fa fa-pencil'> </i>
                		</a>
                		|
                		<a href='#' class='btn btn-danger' id='<?php echo $value['status'] ?>' onclick='eliminarAlumno(this.id)' title='Elimina el registro del Student de la base da datos'>
                			<i class='fa fa-trash-o'> </i>
                		</a>
                	</td>
    			<?php } ?>
    						
    		</tr>	
    	<?php 
    		}
    	?>
    </tbody> 
</table>
<a href='#' class='btn btn-primary' onclick='ventanaNuevoAlumno()'><i class='fa fa-plus-circle'> Agregar Alumno </i></a>