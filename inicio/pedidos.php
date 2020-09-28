<?php 
session_start();
include ('conexion.php');

$query = "SELECT pe.cod_pedido,p.nombre_proveedor,u.nombre as usuario,pe.fecha_pedido as fecha_pe,pe.fecha_pago as fecha_pa,pe.terminos_entrega,pe.estado FROM Pedidos pe INNER JOIN Proveedores AS p ON p.cod_proveedor=pe.cod_proveedor INNER JOIN Usuarios u ON u.cod_usuario=pe.cod_usuario  ";
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
	<title>Pedidos Realizados</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="jumbotron col-md-12">
				<h1>Pedidos Realizados</h1>
			
	<div class="container-fluid">
			<table class="table table-hover">	
				<thead>
					 <tr>
					 	<th>Id</th>
						<th>Proveedor</th>
						<th>Elaborado</th>
						<th>Fecha Pedido</th>
						<th>Fecha Pago </th>
						<th>Terminos Entrega </th>
						<th>Estado </th>
						<th>Autorizo </th>
						<th>Recibio </th>
					  </tr>
				</thead>
				<tbody>		
					<?php		
						while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
					?>
					<tr>
					<td><?php echo $row["cod_pedido"]; ?></td> 
					<td><?php echo $row["nombre_proveedor"]; ?></td> 
					<td><?php echo $row["usuario"]; ?></td>
					<td><?php echo date_format($row["fecha_pe"],'d-m-Y'); ?></td>
					<td><?php echo date_format($row["fecha_pa"],'d-m-Y'); ?></td>
					<td><?php echo $row["terminos_entrega"]; ?></td>
					<td><?php echo $row["estado"]; ?></td>
				

						
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
