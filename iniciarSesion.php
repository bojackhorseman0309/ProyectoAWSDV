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
	<meta charset="UTF-8">
	<title>Iniciar Sesion</title>
	<script type="text/javascript" src="codJs.js"></script>
</head>
<body>

	<h1>Iniciar Sesion</h1>

	<div>
		<fieldset>
				
				<label>Correo:</label><input type="text" name="nomUsuario" id="correoLog">
				<label>Contraseña:</label><input type="password" name="contra" id="conLog">
				<input type="submit" name="btnEnv" value="Enviar" onclick="iniciarSesion('iniciarSesion')">

		</fieldset>
			
	</div>

	<div id="divErrCor"></div>
	<div id="divErrCon"></div>
	<div id="divRespIni"></div>

	<button id="btnVolver" onclick="location.href='inicio.html'">Volver a Inicio</button>
	
	
</body>
</html>