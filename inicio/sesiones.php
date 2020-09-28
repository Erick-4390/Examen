<?php 
session_start();
include ('conexion.php');

$query = "SELECT s.cod_sesiones, u.nombre, s.fecha, s.hora_inicio,s.hora_fin FROM Sesiones AS s INNER JOIN Usuarios AS u ON u.cod_usuario=s.cod_usuario";
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


 ?>


 <html>
<head>
	<meta charset="utf-8">
	<title>Sesiones</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="jumbotron col-md-12">
				<h1>Sesiones</h1>
			
	<div class="container-fluid">
			<table class="table table-hover">	
				<thead>
					 <tr>
					 	<th>Id </th>
						<th>Usuarios</th>
						<th>Fecha </th>
						<th>Inicio Sesion</th>
						<th>Cerro Sesion</th>
					  </tr>
				</thead>
				<tbody>		
					<?php		
						while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
					?>
					<tr>
					<td><?php echo $row["cod_sesiones"]; ?></td> 
					<td><?php echo $row["nombre"]; ?></td> 
					<td><?php echo date_format($row["fecha"],'d-m-Y'); ?></td>
					<td><?php echo date_format($row["hora_inicio"],'H:i:s'); ?></td>
					<td><?php echo date_format($row["hora_fin"],'H:i:s'); ?></td>
		
						
						
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