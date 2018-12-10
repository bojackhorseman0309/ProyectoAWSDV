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
 	<link rel="stylesheet" type="text/css" href="css/css.css">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

 	<meta charset="utf-8">

 	<title>Ordenar</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body background="img/pizza22.gif">

 	<div class="container-fluid">
 		
	 		<h1>Ordenar Pizza</h1>

	 	<div id="divOrden">

	 		 <div class="col-sm-3"><label style="color: white">Vegetales: </label>

			 		<select name="veg" id="sVeg" required class="form-control">

			 			<?php 
			 			$sql='SELECT tipo_vegetales FROM tipos_vegetales;';

			 			$res=mysqli_query($conn, $sql);

			 			while ($row = mysqli_fetch_array($res)) {
			 				echo "<option>" . $row['tipo_vegetales']. "</option>";
			 			}

			 			 ?>

			 		</select>

	 		</div>

	 		
		 <div class="col-sm-3"><label style="color: white">Carnes: </label>

		 		<select name="carne" id="sCar" required class="form-control">
		 			<?php 

		 			$sql='SELECT tipo_carne FROM tipo_carnes;';

		 			$res=mysqli_query($conn, $sql);

		 			while ($row = mysqli_fetch_array($res)) {
		 				echo "<option>" . $row['tipo_carne']. "</option>";
		 			}

		 			 ?>
		 		</select>

	 	</div>
			
			 <div class="col-sm-3"><label style="color: white">Masa: </label>

		 		<select name="masa" id="sMasa" required class="form-control">

		 			<?php 

		 			$sql='SELECT tipo_masa FROM tipo_masas;';

		 			$res=mysqli_query($conn, $sql);

		 			while ($row = mysqli_fetch_array($res)) {
		 				echo "<option>" . $row['tipo_masa']. "</option>";
		 			}

		 			 ?>

		 		</select>

	 		</div>
	 		
	 		 <div class="col-sm-3"><label style="color: white">Tamaño: </label>

		 		<select name="tamanho" id="sTama" required class="form-control">

		 			<?php 

		 			$sql='SELECT tamanho FROM tamanho_pizza;';

		 			$res=mysqli_query($conn, $sql);

		 			while ($row = mysqli_fetch_array($res)) {
		 				echo "<option>" . $row['tamanho']. "</option>";
		 			}

		 			 ?>

		 		</select>

			</div>

	 		
			

	 	</div>
		<div>
			
			<button id="btnGenPrecio" onclick="generarPrecio('genPrecio')" class="btn btn-info">Generar Precio</button>
			<button id="btnOrdenar" onclick="ordenar('orden')" class="btn btn-info">Enviar Orden</button>
			<button id="btnVolver" onclick="location.href='inicioUsuario.php'" class="btn btn-info">Volver a Inicio</button>
			<button onclick="cerrarSesion('cerrar')" class="btn btn-info">Cerrar Sesion</button>


		</div>
	 
		<div class="col-sm-3" style="visibility: hidden" id="divPrec">
			<label for="divPrecio">Precio: </label>
		<textarea class="form-control" rows="1" id="divPrecio" ></textarea>

			

		</div>
		<br>

		<div id="divResp" class="col-sm-3">
	 		

	 	</div>

	 
	 	


 	</div>

 	
 </body>
 </html>