<?php 
session_start();
include ('conexion.php');

if (isset($_POST['submit'])) {
	$nombre = $_POST['name'];
	$razon = $_POST['razon'];
	$direccion= $_POST['address'];
	$telefono= $_POST['telephone'];
	$correo = $_POST['email'];
	crear_nuevo_proveedor($conexion,$nombre,$razon,$direccion,$telefono,$correo);
	header('Location: proveedores.php');
}

if (!isset($_SESSION['id_usuario'])) {
	header('Location: /isertec/login.php');
}else{
	$puesto = $_SESSION['cod_puesto'];
	
	switch ($puesto) {
		case 1:
			include ('nav.php');
			break;
		case 2:
			include ('nav2.php');
			header('Location: index.php');
			break;
		case 3:
			include ('nav3.php');
			header('Location: index.php');
			break;
		
		default:
			# code...
			break;
	}
}

function crear_nuevo_proveedor($conn,$nom,$raz,$direc,$telefono,$corr){
	$insertar = "INSERT INTO Proveedores(nombre_proveedor, razon_social, direccion, telefono,correo) VALUES(?,?,?,?,?)";
	$parameters = array($nom,$raz, $direc, $telefono,$corr);
	$stmt = sqlsrv_query($conn, $insertar, $parameters);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro de Proveedores</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Nuevo Proveedor</h1>
			<a class="btn btn-info" href="index.php">Regresar</a>
		</div>

		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
					<label class="control-label col-md-2">Nombre Proveedor</label>
					<div class="col-md-10">
						<input type="text" name="name" class="form-control" required>							
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Razon Social</label>
					<div class="col-md-10">
						<input type="text" name="razon" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Direccion</label>
					<div class="col-md-10">
						<input type="text" name="address" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Telefono</label>
					<div class="col-md-10">
						<input type="text" name="telephone" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Correo</label>
					<div class="col-md-10">
						<input type="email" name="email" class="form-control" required>							
					</div>
				</div>	
							
			</div>
		
				<input type="submit" name="submit" class="btn btn-danger" value="Guardar">
			</form>
			
		</div>
		
	</div>
	
</div>
</body>
</html>