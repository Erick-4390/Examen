<?php 
session_start();
include ('conexion.php');

$query = "SELECT * FROM Puestos";
$result = sqlsrv_query($conexion,$query);

if (isset($_POST['submit'])) {
	$name = $_POST['nombre'];
	$nombre = $_POST['name'];
	$pssw= $_POST['pwd'];
	$puesto = $_POST['puesto'];
	crear_nuevo_usuario($conexion,$name,$nombre,$pssw,$puesto);
	header('Location: usuarios.php');
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

function crear_nuevo_pedido($conn,$user,$nomb,$pass,$puesto){
	$insertar = "INSERT INTO Usuarios(usuario, nombre, contrasena, cod_puesto) VALUES(?,?,?,?)";
	$parameters = array($user,$nomb, $pass, $puesto);
	$stmt = sqlsrv_query($conn, $insertar, $parameters);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Nuevo Usuario</h1>
			<a class="btn btn-info" href="index.php">Regresar</a>
		</div>

		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
					<label class="control-label col-md-2">Usuario</label>
					<div class="col-md-10">
						<input type="text" name="nombre" class="form-control" required>							
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Nombre</label>
					<div class="col-md-10">
						<input type="text" name="name" class="form-control" required>							
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2">Contraseña</label>
					<div class="col-md-10">
						<input type="password" name="pwd" class="form-control" required>
						<br>
					</div>

					<div class="form-group">
					<label class="control-label col-md-2">Puesto</label>
					<div class="col-md-10">
						<select name="puesto" class="form-control" required>
							<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){ ?>
							<option value="<?php echo $row["cod_puesto"] ?>"><?php echo $row["nombre_puesto"]; ?></option>
							<?php 
								}
							 ?>
						</select>
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