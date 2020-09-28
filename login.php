<?php
session_start();
include ('conexion.php');
ini_set('date.timezone', 'America/Guatemala');

if (isset($_POST['submit'])) {

$hora = date('H:i:s', time());
$fecha = date('Y-m-d', time());
$usuario = $_POST['username'];
$clave = $_POST['pass'];
$_SESSION['date'] = $fecha;
$_SESSION['hour'] =  $hora;
$query = "select * From usuarios Where usuario = ? and contrasena = ?";
$params = array($usuario,$clave);
$resultado = sqlsrv_query($conexion,$query,$params);

while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
	$_SESSION['id_usuario'] = $row["cod_usuario"];
	$_SESSION['nombreUsuario'] = $row["nombre"];
	$_SESSION['cod_puesto'] = $row["cod_puesto"];
	inicio_sesion($conexion);
}
}
if (isset($_SESSION['id_usuario'])) {

	$puesto = $_SESSION['cod_puesto'];
	
	switch ($puesto) {
		case 1:
			header('Location: inicio/index.php');
			break;
		case 2:
			header('Location: inicio/index.php');
			break;
		case 3:
			header('Location: inicio/index.php');
			break;
		
		default:
			# code...
			break;
	}
}else{
	
	
}

function inicio_sesion($conn){
	$insertar = "INSERT INTO Sesiones(cod_usuario, fecha, hora_inicio) values(?,?,?)";
	$params = array($_SESSION['id_usuario'], $_SESSION['date'], $_SESSION['hour'] );

	$stmt = sqlsrv_query($conn, $insertar, $params);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Isertec</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Inicio de Sesion
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="Usuario" required>
						<span class="focus-input100"></span>
					</div>
					<br><br>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button name="submit" type="submit" class="login100-form-btn">
							Iniciar 
						</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Olvide Mi
						</span>

						<a href="#" class="txt2">
							Usuario / Contraseña?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							(c) Isertec
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/logo2.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
</body>
</html>