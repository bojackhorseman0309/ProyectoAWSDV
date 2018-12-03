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
 	<title>Ordenar</title>
 	<script type="text/javascript" src="codJs.js"></script>
 </head>
 <body>

 	<h1>Ordenar Pizza</h1>

 	<div id="divOrden">

 		<label>Vegetales: </label>

 		<select name="veg" id="sVeg" required >
 			<?php 
 			$sql='SELECT tipo_vegetales FROM tipos_vegetales;';

 			$res=mysqli_query($conn, $sql);

 			while ($row = mysqli_fetch_array($res)) {
 				echo "<option>" . $row['tipo_vegetales']. "</option>";
 			}

 			 ?>
 		</select>

		<label>Carnes: </label>

 		<select name="carne" id="sCar" required>
 			<?php 

 			$sql='SELECT tipo_carne FROM tipo_carnes;';

 			$res=mysqli_query($conn, $sql);

 			while ($row = mysqli_fetch_array($res)) {
 				echo "<option>" . $row['tipo_carne']. "</option>";
 			}

 			 ?>
 		</select>

 		<label>Masa: </label>

 		<select name="masa" id="sMasa" required>
 			<?php 

 			$sql='SELECT tipo_masa FROM tipo_masas;';

 			$res=mysqli_query($conn, $sql);

 			while ($row = mysqli_fetch_array($res)) {
 				echo "<option>" . $row['tipo_masa']. "</option>";
 			}

 			 ?>
 		</select>

 		<label>Tamaño: </label>

 		<select name="tamanho" id="sTama" required>
 			<?php 

 			$sql='SELECT tamanho FROM tamanho_pizza;';

 			$res=mysqli_query($conn, $sql);

 			while ($row = mysqli_fetch_array($res)) {
 				echo "<option>" . $row['tamanho']. "</option>";
 			}

 			 ?>
 		</select>
		
		<button id="btnGenPrecio" onclick="generarPrecio('genPrecio')">Generar Precio</button>
		<button id="btnOrdenar" onclick="ordenar('orden')">Enviar Orden</button>
		<button id="btnVolver" onclick="location.href='inicioUsuario.php'">Volver a Inicio</button>
		<button onclick="cerrarSesion('cerrar')">Cerrar Sesion</button>

 	</div>


	<div id="divPrecio"></div>

 	<div id="divResp"></div>
 	


 </body>
 </html>