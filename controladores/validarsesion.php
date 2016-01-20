<?php
	// Aqui incluimos el archivo de conexion a MySQL
	include_once("conexion.php");
	$mysqli = conectarse();
	// Copiamos las variables recibidas
	$usu = $_POST['usuario'];
	$cla = $_POST['clave'];
	// CIFRADO DE CLAVE MD5
	$cla_md5 = md5($cla); 
	$sql = "SELECT usuario,clave,tipo FROM usuarios WHERE usuario = '$usu' and clave='$cla_md5' ";
	$resultado = $mysqli->query($sql);
	if($resultado == false) {
		$message  = " Error: (" . $mysqli->errno . ") " . $mysqli->error;
		echo "20".$message; // Error al tratar de grabar los datos
	} else {
		// Obtener los datos encontrados
		$fila = $resultado->fetch_assoc();
		// Obtener la cantidad de registros encontrados
		$num = $resultado->num_rows;
		if($num > 0) {
			// Inicio la sesion y creo 2 variables de sesion. Usuario y Tipo de usuario
			session_start();
			$_SESSION['usuario'] = $usu;
			$_SESSION['tipo'] = $fila['tipo'];
			
			// Defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
			// Esto para ir verificando el tiempo que llevara conectado el usuario.
			$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
			echo "01"; // Entrada Exitosa al Sistema
		} else {
			echo "00"; // Usuario o clave inválido
		}
	}
?>