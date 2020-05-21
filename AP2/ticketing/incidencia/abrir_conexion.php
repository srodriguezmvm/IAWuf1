<?php
	$host = "localhost";
	$usuariodb = "root";
	$clavedb = "sergi123";
	$basededatos = "AP2";
	$tabla_db1 = "incidencies";

	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);

	if ($conexion->connect_errno) {
	    echo "Error al conectar con la base de datos.";
	    exit();
	}

?>
