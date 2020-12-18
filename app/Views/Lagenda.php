<!DOCTYPE html>
<html>
<head>
	<title>Datatable</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('fontawesome/css/all.css') ?>">
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/dataTables.bootstrap4.min.js') ?>"></script>
	<?php
	$mysqli = new mysqli('localhost', 'root', '', 'agenda_bd');
	?>	
</head>
<body background="<?php echo base_url('fondo.jpg') ?>">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?php echo base_url('/') ?>"><i class="fas fa-id-card fa-6x"></i></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url('/') ?>">Inicio <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('/Categorias') ?>">Categoria</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('/Agenda') ?>">Agenda</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
		<hr>
		<div class="row">
			<div class="col-sm-12" style="background-color: #FFFFFF;">
				
				<div class="card-body">
					<button class="bt btn-primary">
						<i class="fas fa-book-reader fa-6x"></i>
					</button>
					<h2>Agenda personal</h2>
					<br>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">
						<span class="fas fa-user-plus"></span> Agregar nuevo contacto
					</button>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover" id="tablaload">
							<thead>
								<td align="center">Id agenda</td>
								<td align="center">Categoria de categoria</td>
								<td align="center">Nombre</td>
								<td align="center">Apellido Paterno</td>
								<td align="center">Apellido Materno</td>
								<td align="center">Telefono</td>
								<td align="center">E-mail</td>
								<td align="center">Fecha de ingreso</td>
								<td align="center">Editar</td>
								<td align="center">Eliminar</td>
							</thead>
							<tbody>
								<?php foreach($datos as $key): ?>
									<tr>

										<td align="center"><?php echo $key->id_agenda ?></td>
										<td align="center"><?php echo $key->Categorias ?></td>
										<td align="center"><?php echo $key->nombre ?></td>
										<td align="center"><?php echo $key->Apaterno ?></td>
										<td align="center"><?php echo $key->Amaterno ?></td>
										<td align="center"><?php echo $key->telefono ?></td>
										<td align="center"><?php echo $key->email ?></td>
										<td align="center"><?php echo $key->fechaInsert ?></td>
										<td style="text-align: center">
											<a href="<?php echo base_url().'/obtenerNombreA/'.$key->id_agenda?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
										</td>
										<td style="text-align: center">
											<a href="<?php echo base_url().'/EliminarA/'.$key->id_agenda?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Modal agregar-->
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Agregar Contacto </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?php echo base_url().'/CrearA'?>">
						<label>Categoria</label>
						<select name="id_categoria" id="id_categoria" class="form-control">
							<option disabled selected>Escoje categoria</option>
							<?php
							$query = $mysqli -> query ("SELECT id_categoria, descripcion FROM t_categoria");
							while ($valores = mysqli_fetch_array($query)) {?>
								<option value="<?php echo $valores[0]?>"><?php echo $valores[1]?></option>
							<?php }?>
						</select>
						<label> Nombre </label>
						<input type="text" name="nombre" id="nombre" class="form-control input-sm">
						<label> Apellido Paterno </label>
						<input type="text" name="Apaterno" id="Apaterno" class="form-control input-sm">
						<label> Apellido Materno </label>
						<input type="text" name="Amaterno" id="Amaterno" class="form-control input-sm">
						<label> Telefono </label>
						<input type="text" name="telefono" id="telefono" class="form-control input-sm">
						<label> E-mail </label>
						<input type="text" name="email" id="email" class="form-control input-sm">
						<label> Fecha de ingreso </label>
						<input type="text" name="fechaInsert" id="fechaInsert" class="form-control input-sm">
						<hr>
						<button type="button" class="btn btn-danger" data-dismiss="modal" >
							<span class="fas fa-times-circle"></span> Cerrar
						</button>
						<button class="btn btn-primary"><span class="fas fa-save"></span> Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#tablaload').DataTable();
		} );
	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		let mensaje = '<?php echo $mensaje ?>';


      if (mensaje== '1') {
        swal('Agregado con exito','success');
        
      }else if (mensaje== '0') {
        swal('Fallo al agregar','error');
        
      }
      else if (mensaje== '2') {
        swal('Dato actualizado','success');
        
      }
      else if (mensaje== '3') {
        swal('Fallo al Editar','error');
        
      }
      else if (mensaje== '4') {
        swal('Dato eliminado','success');
        
      }
      else if (mensaje== '5') {
        swal('Fallo al eliminar','error');
        
      }
	</script>
</body>
</html>