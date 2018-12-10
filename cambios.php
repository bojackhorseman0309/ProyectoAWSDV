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
	<html style="background: url(img/pizza17.gif) no-repeat center center fixed;background-size: cover;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size:cover">
 	<title>Cambios de Usuario</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body>

 	<div class="container-fluid">
 		
 	
		<h1 style="color: white">Ajustes</h1>

		 	<div id="divAjustes" class="form-group col-sm-3"">
		 		
		 		<label style="color: white">Cambiar Correo: </label>
		 		<input type="text" name="correoCamb" id="cambCorreo"class="form-control" >
		 		<div id="divCambCor" class="alert alert-success" style="display: none" ></div>
		 		<button id="btnCambCor" onclick="cambiarCorreo('cambioCorreo')"  class="btn btn-success">Cambiar Correo</button>
		 		 	</div>
		 		<br>
		 
			 <div class="form-group col-sm-3"">
			 		<label style="color: white">Cambiar Contraseña: </label>
			 		<input type="text" name="conCamb" id="cambCon"  class="form-control">
			 		<div id="divCambCon"  class="alert alert-success" style="display: none" ></div>
			 		<button id="btnCambCon" onclick="cambiarCon('cambioContra')" class="btn btn-success">Cambiar Contraseña</button>
			 		
			 </div>
		 	
				<br>

				<div class="form-group col-sm-3"">	
					<label style="color: white">Eliminar Cuenta: </label>
		 			<button id="btnEliminar" onclick="eliminaCuenta('eliminaCuenta')" class="btn btn-success">Eliminar Cuenta</button>
				</div>

 	


 			<button id="btnVolver" onclick="location.href='inicioUsuario.php'" class="btn btn-success">Volver a Inicio</button>

 	</div>
 	
 	
 </body>
 </html>