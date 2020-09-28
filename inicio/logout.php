<?php
session_start();
include ('conexion.php');
ini_set('date.timezone', 'America/Guatemala');
$hora = date('H:i:s', time());
$id = $_SESSION['id_usuario'];
$date = $_SESSION['date'];
$hr= $_SESSION['hour'];

$insertar = "UPDATE Sesiones SET hora_fin = ? where cod_usuario = ?  and fecha = ? and hora_inicio = ? ";
	$params = array( $hora, $id, $date, $hr);

	$stmt = sqlsrv_query($conexion, $insertar, $params);
if( $stmt == false ) {
     die( print_r( sqlsrv_errors(), true));
}
session_destroy();
header("location: /isertec/login.php"); 
?>