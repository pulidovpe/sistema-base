<?php
// Aqui incluimos el archivo de conexion a MySQL
include_once("conexion.php");
$mysqli = conectarse();

$usu=$_REQUEST["usu"];
$sql="DELETE FROM usuarios WHERE usuario='$usu'";
$rbusqueda = $mysqli->query($sql);

?>