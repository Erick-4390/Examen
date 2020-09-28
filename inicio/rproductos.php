<?php 
session_start();
include ('conexion.php');

$query = "SELECT * FROM Categoria_Producto";
$result = sqlsrv_query($conexion,$query);

if (isset($_POST['submit'])) {
	$name = $_POST['nombre'];
	$pcom= $_POST['pcompra'];
	$pven= $_POST['pventa'];
	$stoc = $_POST['stock'];
	$categ = $_POST['cat'];
	
	crear_nuevo_producto($conexion,$name,$pcom,$pven,$stoc, $categ);

	
	header('Location: productos.php');
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

function crear_nuevo_producto($conn,$name,$pcompra,$pventa,$stock,$cat){
	$insertar = "INSERT INTO Productos(nombre_producto,precio_compra,precio_venta,stock,cod_categoria) VALUES(?,?,?,?,?)";
	$parameters = array($name, $pcompra, $pventa,$stock, $cat);
	$stmt = sqlsrv_query($conn, $insertar, $parameters);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registro Productos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Nuevos Productos</h1>
			<a class="btn btn-info" href="index.php">Regresar</a>
		</div>

		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
					<label class="control-label col-md-2">Nombre Producto</label>
					<div class="col-md-10">
						<input type="text" name="nombre" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Precio Compra</label>
					<div class="col-md-10">
						<input type="text" name="pcompra" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Precio Venta</label>
					<div class="col-md-10">
						<input type="text" name="pventa" class="form-control" required>							
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2">Stock</label>
					<div class="col-md-10">
						<input type="text" name="stock" class="form-control" required>							
					</div>
				</div>

					<div class="form-group">
					<label class="control-label col-md-2">Categoria</label>
					<div class="col-md-10">
						<select name="cat" class="form-control" required>
							<?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){ ?>
							<option value="<?php echo $row["cod_categoria"] ?>"><?php echo $row["nombre_categoria"]; ?></option>
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