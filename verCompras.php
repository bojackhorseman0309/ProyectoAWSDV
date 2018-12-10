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
	

	<link rel="stylesheet" type="text/css" href="css/css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estiloPag.css">

 	<title>Ordenes</title>
 	<script type="text/javascript" src="codJs.js"></script>

 </head>
 <body onload="cargaLista('lista')" background="img/pizza7.jpg">

 	<div class="container-fluid">
	<h1 style="color: white">Ordenes Realizadas</h1>

	<div id="divVerOrden"  class="form-group" >
	</div>

	<div id="divNo" style="color: white"></div>

	<button id="btnVolver" onclick="location.href='inicioUsuario.php'" class="btn btn-primary">Volver a Inicio</button>


 	<button onclick="cerrarSesion('cerrar')" class="btn btn-primary">Cerrar Sesion</button>
 	 </div>

 
 </body>
 </html>