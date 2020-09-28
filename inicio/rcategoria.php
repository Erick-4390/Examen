<?php 
session_start();
include ('conexion.php');

if (isset($_POST['submit'])) {
	$name = $_POST['categoria'];

	crear_nuevo_categoria($conexion,$name);

	
	header('Location: index.php');
}

if (!isset($_SESSION['id_usuario'])) {
	header('Location: /pepsi/login.php');
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

function crear_nuevo_categoria($conn,$name){
	$insertar = "INSERT INTO Categoria_Producto(nombre_categoria) VALUES(?)";
	$parameters = array($name);
	$stmt = sqlsrv_query($conn, $insertar, $parameters);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro de una Categoria </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Nuevo Categoria</h1>
			<a class="btn btn-info" href="index.php">Regresar</a>
		</div>

		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
					<label class="control-label col-md-2">Categoria</label>
					<div class="col-md-10">
						<input type="text" name="categoria" class="form-control" required>							
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