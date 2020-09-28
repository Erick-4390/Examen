<?php 
session_start();
include ('conexion.php');

$query = "SELECT * FROM Proveedores";
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
	<title>Proveedores</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="jumbotron col-md-12">
				<h1>Proveedores</h1>
			
	<div class="container-fluid">
			<table class="table table-hover">	
				<thead>
					 <tr>
					 	<th>Id</th>
						<th>Nombre </th>
						<th>Razon Social </th>
						<th>Direccion</th>
						<th>Telefono </th>
						<th>Correo </th>
					  </tr>
				</thead>
				<tbody>		
					<?php		
						while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
					?>
					<tr>
					<td><?php echo $row["cod_proveedor"]; ?></td> 
					<td><?php echo $row["nombre_proveedor"]; ?></td> 
					<td><?php echo $row["razon_social"]; ?></td>
					<td><?php echo $row["direccion"]; ?></td>
					<td><?php echo $row["telefono"]; ?></td> 
					<td><?php echo $row["correo"]; ?></td>
						
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
