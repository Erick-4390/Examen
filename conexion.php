<?php 
	$serverName = "ERICK";
	$connectionInfo = array("Database" =>"isertec", "UID" =>"sa", "PWD" =>"erick"  );

	$conexion = sqlsrv_connect($serverName,$connectionInfo);
	if (!$conexion) {
		die( print_r(sqlsrv_errors(),true ));
		exit();
	 }
	 else{
	 	//echo "Conexion Establecida";
	 }
?>
