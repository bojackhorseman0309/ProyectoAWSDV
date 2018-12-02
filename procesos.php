<?php 


$conn=mysqli_connect('localhost', 'root', '', 'Pizzeria');

mysqli_set_charset($conn, 'utf8');

if (!$conn) {
	echo "Error de BD";
} else{
	$tipo=$_POST['tipo'];

	if ($tipo=='registrarse') {

		$nom=$_POST['usuario'];
		$con=$_POST['contra'];
		$ap=$_POST['apel'];
		$correo=$_POST['correo'];
		$dir=$_POST['dir'];
		$tel=(int) $_POST['tel'];

		$sql= 'INSERT INTO clientes (nombre, apellido, correo, direccion, clave, telefono) VALUES ("'.$nom.'","'.$ap.'","'.$correo.'","'.$dir.'","'.$con.'", '.$tel.')';

	if (mysqli_query($conn, $sql)) {
		echo "Registrado";
	} else{
		echo "No fue registrado correctamente";
	}

  }

  if ($tipo=='iniciarSesion') {
  	$correoIni=$_POST['correoIn'];
  	$passIni=$_POST['contraIn'];

  	$sql='SELECT * FROM clientes 
  	WHERE correo="'.$correoIni.'"
  	AND clave="'.$passIni.'";';

  	$res=mysqli_query($conn, $sql);

  	if (mysqli_num_rows($res)>0) {
  		echo "Ha ingresado correctamente";
  		$array=mysqli_fetch_array($res);
  		session_start();
  		$_SESSION['correoSesh']=$correoIni;
  		$_SESSION['nombreCli']=$array['NOMBRE'];
  	} else{
  		echo "Ha fallado la autenticacion";
  	}
  }


   if ($tipo=='orden') {

   	session_start();

  	$carne=$_POST['carne'];
  	$veg=$_POST['veg'];
  	$masa=$_POST['masa'];
  	$tam=$_POST['tamanho'];
  	$precioFinal=0;

 		    $res = mysqli_query($conn, "SELECT * FROM TIPO_CARNES;");

            while($fila = mysqli_fetch_array($res)){
                if($fila['TIPO_CARNE'] == $carne){
                    $id_carne = $fila['ID_TIPOCARNE'];
                    $precioFinal+= $fila['PRECIO'];
                    break;
                }
            }

       
            $res = mysqli_query($conn, "SELECT * FROM TIPOS_VEGETALES;");

            while($fila = mysqli_fetch_array($res)){
                if($fila['TIPO_VEGETALES'] == $veg){
                    $id_vegetal = $fila['ID_TIPOVEGETALES'];
                    $precioFinal+= $fila['PRECIO'];
                   break;
                }
            }

        
            $res = mysqli_query($conn, "SELECT * FROM TIPO_MASAS;");

            while($fila = mysqli_fetch_array($res)){
                if($fila['TIPO_MASA'] == $masa){
                    $id_masa = $fila['ID_TIPO_MASA'];
                    $precioFinal+= $fila['PRECIO'];
                   break;
                }
            }

         
            $res = mysqli_query($conn, "SELECT * FROM TAMANHO_PIZZA;");

            while($fila = mysqli_fetch_array($res)){
                if($fila['TAMANHO'] == $tam){
                    $id_tamanho = $fila['ID_TAMANHO'];
                    $precioFinal+= $fila['PRECIO'];
                   break;
                }
            }

            $correo = $_SESSION['correoSesh'];
            $nombre= $_SESSION['nombreCli'];
            $descripcion = "<b>Pizza:</b> ".$tam."<br/><b>Tipo de pasta: </b>".$masa."<br/><b>Ingredientes:</b> ".$veg." y ".$carne;

            $resu = mysqli_query($conn, "INSERT INTO PIZZA (ID_TIPOCARNE, ID_TIPOVEGETALES, ID_TIPO_MASA, ID_TAMANHO, PRECIO_FINAL, FECHA, DESCRIPCION, correo, nombre) 
            VALUES ('$id_carne', '$id_vegetal', '$id_masa', '$id_tamanho', '$precioFinal', NOW(), '$descripcion', '$correo', '$nombre');");

            if ($resu) {
            	 echo "Ordenado";
            } else{
            	echo "Error guardando orden";
            }

  }

  if ($tipo=='lista') {

  	session_start();

  	$correo=$_SESSION['correoSesh'];

  	$sql='SELECT * FROM PIZZA
  	WHERE correo= "'.$correo.'";';

  	$res=mysqli_query($conn, $sql);

  	$arrayJson=array();

  	if (mysqli_num_rows($res)>0) {

  		while ($fila = mysqli_fetch_assoc($res)) {
			$arrayJson[]=$fila;
		}

		header('Content-Type: application/json');
		echo json_encode($arrayJson);	
  	}
  }


  if ($tipo=='cerrar') {
  	 
  	session_start();

  	session_unset();

  	if (session_destroy()) {
  		echo "Cerrado";
  	} else{
  		echo "No se pudo cerrar la sesion";
  	}

  }

	
}

 ?>