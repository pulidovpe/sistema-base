<?php
	function conectarse() {
		$BaseDeDatos = "sistema-base";
		$Servidor = "localhost";
		$Usuario = "pulidovpe";
		$Clave = "123456";
		
		$mysqli = new mysqli($Servidor, $Usuario, $Clave, $BaseDeDatos);
		if ($mysqli->connect_errno) {
			echo "Error de conexión: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		return $mysqli;
	}
?>
