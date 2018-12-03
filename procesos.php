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
  		$_SESSION['idCli']=$array['ID_CLIENTES'];

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
            $iden=$_SESSION['idCli'];
            $descripcion = "<b>Pizza:</b> ".$tam."<br/><b>Tipo de pasta: </b>".$masa."<br/><b>Ingredientes:</b> ".$veg." y ".$carne;

            $resu = mysqli_query($conn, "INSERT INTO PIZZA (ID_TIPOCARNE, ID_TIPOVEGETALES, ID_TIPO_MASA, ID_TAMANHO, PRECIO_FINAL, FECHA, DESCRIPCION, correo, nombre, ID_CLIENTES) 
            VALUES ('$id_carne', '$id_vegetal', '$id_masa', '$id_tamanho', '$precioFinal', NOW(), '$descripcion', '$correo', '$nombre', '$iden');");

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
  	} else{
  		echo "No hay datos";
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


  if ($tipo=='cambioCorreo') {

  	session_start();

  	$correo=$_POST['cambCorreo'];
  	$identif=$_SESSION['idCli'];

   if (strlen($correo)==0) {

      echo "Digite un correo";

    }else{ 

      $sqlUno='UPDATE PIZZA
                SET correo="'.$correo.'"
                WHERE ID_CLIENTES="'.$identif.'";';

      $sqlDos='UPDATE CLIENTES
               SET correo="'.$correo.'"
               WHERE ID_CLIENTES="'.$identif.'";'; 

      $resUno=mysqli_query($conn, $sqlUno);
      $resDos=mysqli_query($conn, $sqlDos);

      if ($resDos) {

      	$_SESSION['correoSesh']=$correo;

        echo "Modificado";

      } else{

        echo "Error";

      }
    }
  }  

   if ($tipo=='cambioContra') {
  	session_start();

  	$iden=$_SESSION['idCli'];
  	$pass=$_POST['cambCon'];

    if (strlen($pass)==0) {

      echo "Digite una Contraseña";

    } else{

      $sql='UPDATE CLIENTES
             set CLAVE="'.$pass.'"
             WHERE ID_CLIENTES='.$iden.';';

      $res=mysqli_query($conn, $sql);

      if ($res) {

        echo "Modificado";

      }else{

        echo "Error";

      }
    }
}

   if ($tipo=='eliminaCuenta') {
  	session_start();

  	$iden=$_SESSION['idCli'];
  	$correo=$_SESSION['correoSesh'];

  	session_unset();

  	$sqlUno='DELETE FROM PIZZA
  			WHERE correo="'.$correo.'";';

  	$sqlDos='DELETE FROM CLIENTES
  			WHERE ID_CLIENTES="'.$iden.'";';

  	$resPrim=mysqli_query($conn, $sqlUno);
  	$resSeg=mysqli_query($conn, $sqlDos);

  	if (session_destroy()) {

  			if (!$resPrim) {
  				echo "Error";
  			} 

  			if (!$resSeg) {
  				echo "Error";
  			} else{
  				echo "Borrado";
  			}
  	}else{

  		echo "Error";

  	}

  }



  function precioCar($aux){

  	global $conn;
  	$precio=0;

  	$sqlCar='SELECT PRECIO FROM TIPO_CARNES
  				WHERE TIPO_CARNE="'.$aux.'";';

	$resCar=mysqli_query($conn, $sqlCar);

		if (mysqli_num_rows($resCar)>0) {
			
			while ($fila = mysqli_fetch_array($resCar)) {
			$precio=(int) $fila['PRECIO'];
		}
	}
		return $precio;
  }

  function precioVeg($aux){

  	global $conn;
  	$precio=0;
  	
  		$sqlVeg='SELECT PRECIO FROM TIPOS_VEGETALES
  				WHERE TIPO_VEGETALES="'.$aux.'";';

		$resVeg=mysqli_query($conn, $sqlVeg);

		if (mysqli_num_rows($resVeg)>0) {

			while ($fila = mysqli_fetch_array($resVeg)) {
			$precio=(int) $fila['PRECIO'];
		}
	}
		return $precio;
  }

  function precioMasa($aux){

  	global $conn;
  	$precio=0;
  	
		$sqlMasa='SELECT PRECIO FROM TIPO_MASAS
  				 WHERE TIPO_MASA="'.$aux.'";';

		$resMasa=mysqli_query($conn, $sqlMasa);

		if (mysqli_num_rows($resMasa)>0) {
			
			while ($fila = mysqli_fetch_array($resMasa)) {
			$precio=(int) $fila['PRECIO'];
		}
	}
		return $precio;
  }

  function precioTam($aux){

  	global $conn;
  	$precio=0;

  		$sqlTam='SELECT PRECIO FROM TAMANHO_PIZZA
  				WHERE TAMANHO="'.$aux.'";';

  		$resTam=mysqli_query($conn, $sqlTam);

  		if (mysqli_num_rows($resTam)>0) {

  			while ($fila = mysqli_fetch_array($resTam)) {
			$precio=(int) $fila['PRECIO'];
		}
			
		}

		return $precio;
  }


  if ($tipo=='genPrecio') {
  	$carne=$_POST['carne'];
  	$veg=$_POST['veg'];
  	$tam=$_POST['tam'];
  	$masa=$_POST['masa'];

  	$precCarne= precioCar($carne);
  	$precVeg= precioVeg($veg);
  	$precMasa= precioMasa($masa);
  	$precTam=precioTam($tam);

  	$precioFinal=$precCarne+$precVeg+$precMasa+$precTam;

  	echo "$precioFinal";
  
  }



}


 ?>