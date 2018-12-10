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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootsrap/css/bootstrap.min.css">
	<script type="text/javascript" src="codJs.js"></script>
</head>
<body background="img/pizza5.jpg"> 

	<div class="container-fluid">

		<h1 class="text-white">Registro</h1>

		  <div class="form-group col-sm-3">
		    	<label class="text-white" for="nomReg">Nombre:</label><input type="text" name="nomUsuarioReg" id="nomReg" class="form-control">
		    	<div class="alert alert-danger" style="display: none" id="div2ErrNom">
		    		<div id="divErrNom" class="text-danger"></div>
		    	</div>
		    	
		  </div>

		  <div class="form-group col-sm-3" for="apelReg">
		    	<label class="text-white">Apellido:</label><input type="text" name="apelReg" id="apel" class="form-control">
		    	<div class="alert alert-danger" style="display: none" id="div2ErrAp">
		    		<div id="divErrAp"   class="text-danger"></div>
		    	</div>
		  </div>

		   <div class="form-group col-sm-3" >
		   		<label  class="text-white" for="tel">Telefono:</label><input type="text" name="telReg" id="tel" placeholder="8888-8888" class="form-control">
		   		<div class="alert alert-danger" style="display: none"  id="div2ErrTel">
		   			<div id="divErrTel"   class="text-danger"></div>
		   		</div>
		  </div>

		   <div class="form-group col-sm-3">
		    	<label class="text-white">Direccion:</label><input type="text" name="dirReg" id="dir" class="form-control">
		    	<div class="alert alert-danger" style="display: none"  id="div2ErrDir">
		    		<div id="divErrDir"   class="text-danger"></div>
		    	</div> 
		  </div>

		   <div class="form-group col-sm-3" for="correo">
		    	<label class="text-white">Correo:</label><input type="text" name="correoReg" id="correo" placeholder="correo@correo.com" class="form-control">
		    	<div class="alert alert-danger" style="display: none"  id="div2ErrCor">
		    		<div id="divErrCor"   class="text-danger"></div>
		    	</div>
		  </div>

		   <div class="form-group col-sm-3" for="conReg">
		    	<label class="text-white">Contraseña:</label><input type="password" name="contraReg" id="conReg" class="form-control">
		    	<div class="alert alert-danger" style="display: none"  id="div2ErrCon">
		    		<div id="divErrCon"  class="text-danger"></div>
		    	</div>
		    	
		  </div>
		  
		  <button  name="btnEnvReg" onclick="registrarse('registrarse')" class="btn btn-primary">Enviar</button>
		  <button id="btnVolver" onclick="location.href='inicio.html'" class="btn btn-primary">Volver a Inicio</button>

	</div>
</body>
</html>