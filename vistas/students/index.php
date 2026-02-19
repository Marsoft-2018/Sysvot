
<?php 
	$obj = new Student();
?>

	<div class="row">
		<!-- `New` Constructor table end -->
		<!-- Immediately Show Hidden Details table start -->
		<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
			<h5 class="mb-3">LISTADO DE ALUMNOS REGISTRADOS</h5>
			
			<a href='#' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="newStudent()"><i class='fa fa-plus-circle'> Agregar Alumno </i></a><br><br>
			<!-- <small
				>Responsive has the ability to display the details that it has hidden in a variety of different ways. Its default is to
				allow the end user to toggle the the display by clicking on a row and showing the information in a DataTables child
				row</small
			> -->
			</div>
			<div class="card-body">
			<div class="dt-responsive table-responsive">
				<table id="show-hide-res" class="display table table-striped table-hover dt-responsive nowrap" style="width: 100%">
				<thead>
					<tr>
						<th>Código</th>
						<th>Grado</th>
						<th>Nombre Completo</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($obj->list() as $value) { ?>
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
									<a href='#' class='btn btn-success'  data-bs-toggle="modal" data-bs-target="#staticBackdrop" title='Editar datos del Estudiante' id='<?php echo $value['id'] ?>' onclick='editStudent(this.id)'>
										<i class='ti ti-pencil'> </i>
									</a>
									|
									<a href='#' class='btn btn-danger' id='<?php echo $value['id'] ?>' onclick='deleteStudent(this.id)' title='Elimina el registro del Estudiante de la base da datos'>
										<i class='ti ti-trash'> </i>
									</a>
								</td>
							<?php } ?>
										
						</tr>	
					<?php 
						}
					?>
				</tbody>
				</table>
				<a href='#' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="newStudent()"><i class='fa fa-plus-circle'> Agregar Alumno </i></a><br><br>
			</div>
			</div>
		</div>
		</div>
		<!-- Immediately Show Hidden Details table end -->
	</div>
	