<?php 

session_start();

if (!isset($_SESSION['correoSesh']) || empty($_SESSION['correoSesh'])) {
	header('Location: inicio.html');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Inicio</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body>

 	<button onclick="location.href='ordenar.php';">Ordenar</button>
 	<button onclick="cerrarSesion('cerrar')">Cerrar Sesion</button>

 	
 </body>
 </html>