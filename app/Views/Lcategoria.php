<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Categorias
	</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('fontawesome/css/all.css') ?>">
	<script src="<?php echo base_url('js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('datatable/dataTables.bootstrap4.min.js') ?>"></script>


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
					<h2>Categorias</h2>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalInsertar">
						<span class="fas fa-clipboard-check"></span> Agregar nuevo
					</button>
					<hr>
					<div class="table-responsive">
						<table class="table table-hover" id="tablaload">
							<thead>
												 <tr>
				                <th>Numero de categoria</th>
				                <th>Nombre</th>
				                <th>Descripción</th>
				                <th>Fecha de ingreso</th>
				                <th>Editar</th>
				                <th>Eliminar</th>
				              </tr>
				          </thead>
				          <tbody>
			              <?php foreach ($datos as $key): ?>
			              <tr>
			                <td><?php echo $key->id_categoria ?></td>
			                <td><?php echo $key->nombre ?></td>
			                <td><?php echo $key->descripcion ?></td>
			                <td><?php echo $key->fechaInsert ?></td>
			                <td>
			                  <a href="<?php echo base_url().'/obtenerNombre/'.$key->id_categoria ?>" class="btn btn-warning btn-sm">Editar</a>
			                </td>
			                <td>
			                  <a href="<?php echo base_url().'/Eliminar/'.$key->id_categoria ?>" class="btn btn-danger btn-sm" >Eliminar</a>
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

	<!-- Modal -->
	<div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> Agregar Nueva Categoria </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?php echo base_url().'/Crear' ?>">
						<label> Categoria </label>
						<input type="text" class="form-control input-sm" id="id_categoria" name="id_categoria">
						<label>Nombre de categoria</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Descripción</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Fecha de ingreso</label>
						<input type="text" class="form-control input-sm" id="fechaInsert" name="fechaInsert">
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