<?php 
session_start();
include ('conexion.php');

$query = "SELECT * FROM Productos";
	$result = sqlsrv_query($conexion,$query);

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
			break;
		
		default:
			# code...
			break;
	}
}


 ?>
 <html>
<head>
	<meta charset="utf-8">
	<title>Productos</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="jumbotron col-md-12">
				<h1>Productos</h1>
			
	<div class="container-fluid">
			<table class="table table-hover">	
				<thead>
					 <tr>
					 	<th>Id</th>
						<th>Producto </th>
						<th>Precio </th>
						<?php if($puesto==1){?><th>Stock </th> <?php }?>
					  </tr>
				</thead>
				<tbody>		
					<?php		
						while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
					?>
					<tr>
					<td><?php echo $row["cod_producto"]; ?></td> 
					<td><?php echo $row["nombre_producto"]; ?></td> 
					<td><?php echo $row["precio_venta"]; ?></td> 
					
						<!-- action -->
						<?php
						if ($puesto==1||$puesto==2) {?>
							<td><?php echo $row["stock"]; ?></td> 
							<td class="table-row" colspan="2">
							<a class="btn btn-primary" href="edit.php?id=<?php echo $row["cod_producto"]; ?>">
							<span class="glyphicon glyphicon-pencil"></span>
						</a> 
						<a class="btn btn-danger" href="delete.php?id=<?php echo $row["cod_producto"]; ?>" onclick="return confirm('Deseas eliminar a - <?php echo $row["nombre"]; ?>?')">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
						</td>
						<?php } ?>
						
					</tr>
					<?php
							}
					?>
				</tbody>
			</table>
		</div>
	</div>

	</div>
	</div>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
