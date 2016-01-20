<?php if(@session_start() == false){session_destroy();session_start();};
if(!isset($_SESSION['usuario'])) { 
	header("Location: cerrarsesion.php");
	exit;
}

// Aqui incluimos el archivo de conexion a MySQL
include_once("conexion.php");
$mysqli = conectarse();

$RegistrosAMostrar=5;
//estos valores los recibo de la vista del paginador
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
}
/* ******* */
$sql = "select * from usuarios order by usuario asc limit $RegistrosAEmpezar, $RegistrosAMostrar";
$resultado = $mysqli->query($sql);

?>

<div id="datos-usuarios" align="center">
  <br />
  <table weigth="400" height="87" border="1" align="left" id="table_results">
		<thead>
			<tr>
				<th colspan="2" ><em> Accion </em></th>
				<th width="100" ><em> Usuario </em></th>
				<th width="100" ><em> Nombre </em></th>
				<th width="100" ><em> Teléfono </em></th>
			</tr>
		</thead>
		<tbody>
<?php
while($MostrarFila=$resultado->fetch_assoc()) {	
	printf("
	<tr>
		<td width='24' align='center'>
			<a onclick=\"javascript:llamarasincronoget('vistas/modificarusuario.php?usu=%s','contenedor','centro','0')\" style='cursor:pointer' >
				<img src='img/b_edit.png' alt='Modificar' width='16' height='16' border='0' class='icon' title='Editar' />
			</a>
		</td>
		<td width='24' align='center'>
			<a onclick=\"javascript:llamarasincronoget('controladores/eliminarusuario.php?usu=%s','div-usuario','paginador','3');eliminar_ele('centro');crear_ele('contenedor','div','centro');llamarasincronoget('vistas/usuarios.php','contenedor','centro','0')\" style='cursor:pointer' >
				<img src='img/b_drop.png' alt='Borrar' width='16' height='16' border='0' class='icon' title='Borrar' />
			</a>
		</td>
	",$MostrarFila['usuario'],$MostrarFila['usuario']);
	echo "<td width='100' align='center'>".$MostrarFila['usuario']."</td>";
	echo "<td width='100' align='center'>".$MostrarFila['nombre']."</td>";
	echo "<td width='100' align='center'>".$MostrarFila['telefono']."</td></tr>";	
}      
echo "</tbody></table>";
//******--------determinar las páginas---------******//
$resultado1 = $mysqli->query("SELECT * FROM usuarios");
$NroRegistros = $resultado1->num_rows;
//$NroRegistros=mysql_num_rows(mysql_query("select * from usuarios",$conecta));

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
$pag_usu = '6';
if($PagAct>1) {
	echo "<a onclick=\"Pagina('1','$pag_usu')\" style='cursor:pointer; text-decoration:underline; color:#00008B'>Primero-</a> ";	
	echo "<a onclick=\"Pagina('$PagAnt','$pag_usu')\" style='cursor:pointer; text-decoration:underline; color:#00008B'>Anterior-</a> ";
} else {
	echo "Primero-";	
	echo "Anterior-";
}	
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt) { 
	echo " <a onclick=\"Pagina('$PagSig','$pag_usu')\" style='cursor:pointer; text-decoration:underline; color:#00008B'>-Siguiente</a> ";
	echo "<a onclick=\"Pagina('$PagUlt','$pag_usu')\" style='cursor:pointer; text-decoration:underline; color:#00008B'>-Ultimo</a>";
} else {
	echo "-Siguiente";	
	echo "-Ultimo";
}
?>
</div>