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
 	<title>Ordenes</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body onload="cargaLista('lista')">

 	<h1>Ordenes Realizadas</h1>

	<div id="divVerOrden" >
	</div>

	<button id="btnVolver" onclick="location.href='inicioUsuario.php'">Volver a Inicio</button>


 	<button onclick="cerrarSesion('cerrar')">Cerrar Sesion</button>
 </body>
 </html>