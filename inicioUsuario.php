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
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estiloPag.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="UTF-8">
 	<title>Inicio</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body>

 	<div class="container-fluid">
 		<h1>Bienvenidos a Pizza HuTML</h1>

 		<ul>
			  <li><a class="active" href="ordenar.php">Ordenar</a></li>
			  <li><a href="cambios.php">Ajustes de Usuario</a></li>
			  <li><a onclick="redCompras()";>Ver Compras</a></li>
			  <li><a onclick="cerrarSesion('cerrar')">Cerrar Sesión</a></li>
		</ul>

		<!-- 
	 	<button onclick="location.href='ordenar.php';" class="btn btn-primary">Ordenar</button>
	 	<button onclick="location.href='cambios.php';" class="btn btn-primary">Ajustes de Usuario</button>
	 	<button id="btnCompras" onclick="redCompras()"; class="btn btn-primary">Ver Compras</button>
	 	<button onclick="cerrarSesion('cerrar')" class="btn btn-primary">Cerrar Sesion</button>
		 -->
</div>

 	
 	
 </body>
 </html>