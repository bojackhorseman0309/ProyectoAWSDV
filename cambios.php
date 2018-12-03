<?php 
session_start();

if (!isset($_SESSION['correoSesh']) || empty($_SESSION['correoSesh'])) {
	header('Location: inicio.html');
}


$conn=mysqli_connect('localhost','root','','Pizzeria');
if (!$conn) {
	echo "Error de conexion a BD";
}

mysqli_set_charset($conn, 'utf8');

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<title>Cambios de Usuario</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body>

 	<h1>Ajustes</h1>

 	<div id="divAjustes">
 		
 		<label>Cambiar Correo: </label>
 		<input type="text" name="correoCamb" id="cambCorreo" >
 		<div id="divCambCor"></div>
 		<button id="btnCambCor" onclick="cambiarCorreo('cambioCorreo')">Cambiar Correo</button>
 		
 		<br>
 
 		<label>Cambiar Contraseña: </label>
 		<input type="text" name="conCamb" id="cambCon" >
 		<div id="divCambCon"></div>
 		<button id="btnCambCon" onclick="cambiarCon('cambioContra')">Cambiar Contraseña</button>
 		
		<br>

 		<label>Eliminar Cuenta: </label>
 		<button id="btnEliminar" onclick="eliminaCuenta('eliminaCuenta')">Eliminar Cuenta</button>

 	</div>

 	<button id="btnVolver" onclick="location.href='inicioUsuario.php'">Volver a Inicio</button>
 	
 </body>
 </html>