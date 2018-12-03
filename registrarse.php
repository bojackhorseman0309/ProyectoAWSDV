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
	<title>Registrarse</title>
	<script type="text/javascript" src="codJs.js"></script>
</head>
<body>
	

		<h1>Registro</h1>

		<div>

			<fieldset>

					<label>Nombre:</label><input type="text" name="nomUsuarioReg" id="nomReg">
					<label>Apellido:</label><input type="text" name="apelReg" id="apel">
					<label>Telefono:</label><input type="text" name="telReg" id="tel" placeholder="8888-8888">
					<label>Direccion:</label><input type="text" name="dirReg" id="dir">
					<label>Correo:</label><input type="text" name="correoReg" id="correo" placeholder="correo@correo.com">
					<label>Contraseña:</label><input type="password" name="contraReg" id="conReg">

					<input type="submit" name="btnEnvReg" value="Enviar" onclick="registrarse('registrarse')">

			 </fieldset>

			 <div id="divErrNom"></div>
			 <div id="divErrAp"></div>
			 <div id="divErrTel"></div>
			 <div id="divErrDir"></div>
			 <div id="divErrCor"></div>
			 <div id="divErrCon"></div>

		</div>

	<button id="btnVolver" onclick="location.href='inicio.html'">Volver a Inicio</button>
	
	

</body>
</html>