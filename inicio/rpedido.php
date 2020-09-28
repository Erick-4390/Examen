<?php 
session_start();
include ('conexion.php');

if (isset($_POST['submit'])) {
	$proveedor = $_POST['proveedor'];
	$usuario = $_SESSION['id_usuario'];
	$fecha= $_SESSION['date'];
	$terminos = $_POST['terminos'];
	$estado = $_POST['estado'];
	crear_nuevo_pedido($conexion,$proveedor,$usuario,$fecha,$terminos,$estado);
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

function crear_nuevo_pedido($conn,$prov,$user,$fecha_p,$terminos,$estado){
	$insertar = "INSERT INTO Pedidos(cod_proveedor, cod_usuario, fecha_pedido, terminos_entrega, estado) VALUES(?,?,?,?,?)";
	$parameters = array($prov,$user, $fecha_p, $terminos, $estado);
	$stmt = sqlsrv_query($conn, $insertar, $parameters);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro de Pedidos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Nuevo Pedido</h1>
			<a class="btn btn-info" href="index.php">Regresar</a>
		</div>

		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="">


				<div class="form-group">
					<label class="control-label col-md-2">Proveedor</label>
					<div class="col-md-10">
						<input type="text" name="proveedor" class="form-control" required>							
					</div>
				</div>

				<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type date ">
						<input id="fecha" class="input100" type="date" name="fecha" required>
						<span class="focus-input100"></span>
					</div>

					<div class="form-group">
					<label class="control-label col-md-2">Terminos de Entrega</label>
					<div class="col-md-10">
						<input type="text" name="terminos" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Estado</label>
					<div class="col-md-10">
						<input type="text" name="estado" class="form-control" required>							
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