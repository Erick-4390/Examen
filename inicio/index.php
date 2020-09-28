<?php
session_start();
include ('conexion.php');

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
	<title>Pagina de Inicio</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body background="/isertec/inicio/image/fondo.jpg" style="background-repeat: no-repeat; background-position: center;background-color: white; background-size: 750px" >

<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>