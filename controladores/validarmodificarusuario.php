<?php
	// Aqui incluimos el archivo de conexion a MySQL
	include_once("conexion.php");
	$mysqli = conectarse();
	// Copiamos las variables recibidas
	$usu   = $_POST["usuario"];
	$cla   = $_POST["clave"];
	$ccla  = $_POST["cclave"];
	$nom   = strtoupper($_POST["nombre"]);
	$tele  = $_POST["tele"];
	// Si todas las variables traen datos, chevere
	if(empty($usu) || empty($cla) || empty($ccla) || empty($nom) || empty($tele)) {		
		echo "02"." usuario: $usu";
		// No Deje Campos Vacios
	} else {
		$cla_md5 = md5($cla); // CIFRADO DE CLAVE MD5
		$sql="UPDATE usuarios SET clave='$cla_md5', nombre='$nom', telefono='$tele' WHERE usuario='$usu' ";
		if(!$mysqli->query($sql)) {
			$message  = " Error: (" . $mysqli->errno . ") " . $mysqli->error;
			echo "14" . " EL USUARIO YA EXISTE! ";// .$message;
		} else {
			echo "15" . " MODIFICACION EXITOSA";
		}
	}
?>