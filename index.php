<?php
session_start();
include ('conexion.php');
if (!isset($_SESSION['id_usuario'])) {
	header('Location: login.php');
}else{
	header('Location: /isertec/inicio/index.php');
}
?>
