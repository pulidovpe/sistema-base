<?php session_start(); ?>
<!Doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<title>Login Estandar - Inicio de Sesión</title>
	<script src="js/ajax.js" type="text/javascript"></script>
	<script type="text/javascript">
		// Cada 10 segundos verificamos si no ha caducado la sesion, sino, se cerrara autom.
		// LLamamos la funcion con los repectivos parametros del DIV que queremos refrescar.
		window.onload = function refresca() {
			refrescaDiv('cabeza',5,'controladores/auto.php');
		}
	</script>
</head>
<html>
<body>
	<div id="contenido">
		<header id="cabeza"></header>
		<nav id="menu">
			<?php if(isset($_SESSION['usuario'])) { ?>
			<!-- El menú no se ve si nadie ha iniciado sesión--> 
			<ul>
				<li>
					<!-- Opciones <li></li> para mostrar un menu y cargar las opciones usando ajax -->
					<a onclick="javascript:llamarasincronoget('vistas/xxxxxxx.php','contenedor','centro','0');" style='cursor:pointer'>xxxxxxx</a>
				</li>
				
				<?php if($_SESSION['tipo'] == 1) { ?> 
				<!-- Estas opciones no se ven si no ha iniciado sesión alguien con el tipo de usuario 1-->
				
				<li>
					<a onclick="javascript:llamarasincronoget('vistas/usuarios.php','contenedor','centro','0');" style='cursor:pointer'>Usuarios</a>
				</li>

				<?php } ?>
				<li class="cerrar_sesion">
					<a href="controladores/cerrarsesion.php" target='_self' style='cursor:pointer'>Salir</a>
				</li>
			</ul>
			<?php } else {
			  echo "<center>";
			  echo "<h1>Sistema Básico con Login Estandar</h1>";
			  echo "</center>";
			}
			?>
		</nav>
		<section>
			<div id="contenedor">
				<div id="centro">
					<?php
					/* La pantalla de login se ve si nadie ha iniciado sesión */ 
					if(!isset($_SESSION['usuario'])) { 
						include('vistas/iniciar_sesion.php'); 
					} ?>					
				</div>
			</div>
		</section>
		<footer id="pie">
			<?php
				/* El nombre de usuario solo se ve si alguien ha iniciado sesión */ 
				if(isset($_SESSION['usuario'])) { 
					echo "<center><small>Usuario: <h3>".$_SESSION['usuario']."</h3></small></center>";
				} 
			?>
		</footer>
	</div>
</body>
</html>