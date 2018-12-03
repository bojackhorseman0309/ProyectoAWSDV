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

 	<h1>Bienvenidos a Pizza HuTML</h1>

 	<button onclick="location.href='ordenar.php';">Ordenar</button>
 	<button onclick="location.href='cambios.php';">Ajustes de Usuario</button>
 	<button id="btnCompras" onclick="redCompras()";>Ver Compras</button>
 	<button onclick="cerrarSesion('cerrar')">Cerrar Sesion</button>

 	
 </body>
 </html>