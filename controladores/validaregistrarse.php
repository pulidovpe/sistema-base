<?php
	// Aqui incluimos el archivo de conexion a MySQL
	include_once("conexion.php");
	$mysqli = conectarse();
	// Copiamos las variables recibidas
	$usuario = $_POST["usuario"];
	$clave   = $_POST["clave"];
	$cclave  = $_POST["cclave"];
	$nombre  = strtoupper($_POST["nombre"]);
	$tele    = $_POST["tele"];
	// Esta opcion la definimos aqui mientras no se puedan 
	// crear usuarios administradores en el formulario
	$tipo    = 2;  // Tipo de usuario => 1: administrador  2: normal
	// Si todas las variables traen datos, chevere
	if(!empty($usuario) || !empty($clave) || !empty($cclave) || !empty($nombre) || !empty($tele)) {		
		// CIFRADO DE CLAVE MD5
		$clave_md5 = md5($clave); 
		/*******************/
		$sql = "INSERT INTO usuarios (usuario, clave, tipo, nombre, telefono) VALUES('$usuario','$clave_md5','$tipo','$nombre','$tele')";
		if(!$mysqli->query($sql)) {
			$message  = " Error: (" . $mysqli->errno . ") " . $mysqli->error;
			echo "14"." El usuario ya existe! ";// .$message;
		} else {
			echo "12" . " GRABACION EXITOSA";
		}		
	} else {
		echo "13"." CAMPOS NO PUEDEN IR VACIOS";
	}
?>