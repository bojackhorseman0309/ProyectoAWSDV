<?php 

session_start();

if (isset($_SESSION['correoSesh']) || !empty($_SESSION['correoSesh'])) {
	header('Location: inicioUsuario.php');
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>Iniciar Sesion</title>
	<script type="text/javascript" src="codJs.js"></script>
</head>
<body background="img/pizza4.jpg">

	<div class="container-fluid">

		<h1 style="color: white">Iniciar Sesion</h1>

	
				<div class="form-inline" >
 			    <label for="correoLog" class="mr-sm-2" style="color: white">Correo:</label><input type="text" name="nomUsuario" id="correoLog" class="form-control mb-2 mr-sm-2">
				<label for="conLog" class="mr-sm-2" style="color: white">Contraseña:</label><input type="password" name="contra" id="conLog" class="form-control mb-2 mr-sm-2">
				<button type="submit" name="btnEnv" onclick="iniciarSesion('iniciarSesion')" class="btn btn-primary mb-2">Enviar</button>
				<button id="btnVolver" onclick="location.href='inicio.html'" class="btn btn-primary">Volver a Inicio</button>
				</div> 
				
				<div>
					<div id="divErrCor" class="alert alert-danger  col-sm-3" style="display: none" ></div>
				</div>
				
				<div>
					<div id="divErrCon" class="alert alert-danger  col-sm-3" style="display: none" ></div>
				</div>
				
				<div id="divRespIni"  class="alert alert-danger  col-sm-3" style="display: none"></div>

	</div>

</body>
</html>