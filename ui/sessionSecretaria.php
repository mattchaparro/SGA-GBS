<?php
include('ui/menuSecretaria.php');
$secretaria = new Secretaria($_SESSION['id']);
$secretaria -> select();
?>
<div class="container">
	<div>
		<div class="card-header">
			<h3>Profile</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-9">
					<div class="table-responsive-sm">
						<table class="table table-striped table-hover">
							<tr>
								<th>Nombre</th>
								<td><?php echo $secretaria -> getNombre() ?></td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td><?php echo $secretaria -> getApellido() ?></td>
							</tr>
							<tr>
								<th>Documento</th>
								<td><?php echo $secretaria -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Correo</th>
								<td><?php echo $secretaria -> getCorreo() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<td><?php echo $secretaria -> getTelefono() ?></td>
							</tr>
							<tr>
								<th>State</th>
								<td><?php echo $secretaria -> getState() ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Your role is: Secretaria"; ?></p>
		</div>
	</div>
</div>
