 
function registrarse(tipo){

  var nomReg=document.getElementById('nomReg').value;
  var passReg=document.getElementById('conReg').value;
  var apelReg=document.getElementById('apel').value;
  var correoReg=document.getElementById('correo').value;
  var telReg=document.getElementById('tel').value;
  var dirReg=document.getElementById('dir').value;
  var divResp=document.getElementById('resp');

  if (validaRegistro()) {

  	 var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('usuario='+nomReg+'&contra='+passReg+'&apel='+apelReg+'&correo='+correoReg+'&tel='+telReg+'&dir='+dirReg+'&tipo='+tipo);

	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status==200) {
			if (req.responseText=='Registrado') {
				window.location.href = 'iniciarSesion.php'
			} else{
				alert('Error de Registro');
			}
			
		}
	}

  }

};

function validaRegistro(){

  var nomReg=document.getElementById('nomReg').value;
  var passReg=document.getElementById('conReg').value;
  var apelReg=document.getElementById('apel').value;
  var correoReg=document.getElementById('correo').value;
  var telReg=document.getElementById('tel').value;
  var dirReg=document.getElementById('dir').value;
  var divErrNom=document.getElementById('divErrNom');
  var divErrAp=document.getElementById('divErrAp');
  var divErrTel=document.getElementById('divErrTel');
  var divErrDir=document.getElementById('divErrDir');
  var divErrCor=document.getElementById('divErrCor');
  var divErrCon=document.getElementById('divErrCon');

  var verificador=true;

  if (nomReg.length==0) {

  	divErrNom.innerHTML="Digite un nombre";
  	verificador=false;

  }else{

  	divErrNom.innerHTML=" ";

  }

  if (passReg.length==0) {

  	divErrCon.innerHTML="Digite una contraseña";
  	verificador=false;

  }else{

  	divErrCon.innerHTML=" ";

  }

  if (apelReg.length==0) {

  	divErrAp.innerHTML="Digite un apellido";
  	verificador=false;

  }else{

  	divErrAp.innerHTML=" ";

  }

  if (correoReg.length==0) {

  	divErrCor.innerHTML="Digite un correo";
  	verificador=false;

  }else{

  	divErrCor.innerHTML=" ";

  }

  if (telReg.length==0) {

  	divErrTel.innerHTML="Digite un telefono";
  	verificador=false;

  }else{

  	divErrTel.innerHTML=" ";

  }

  if (dirReg.length==0) {

  	divErrDir.innerHTML="Digite una direccion";
  	verificador=false;

  }else{

  	divErrDir.innerHTML=" ";

  }

  if (verificador==false) {

  	return false;

  } else{

  	return true;

  }

};


function iniciarSesion(tipo){

  var correoIn=document.getElementById('correoLog').value;
  var passIn=document.getElementById('conLog').value;
  var divRespIni=document.getElementById('divRespIni');


  if (verificaInicio()) {
  	 var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('correoIn='+correoIn+'&contraIn='+passIn+'&tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Ha ingresado correctamente') {

				window.location.href = 'inicioUsuario.php';

			} else if(req.responseText=="Ha fallado la autenticacion"){

				divRespIni.innerHTML="Datos ingresados no coinciden con los registros";

			}
		}
	}
  }
 
};


function verificaInicio(){
  var correoIn=document.getElementById('correoLog').value;
  var passIn=document.getElementById('conLog').value;
  var divErrCor=document.getElementById('divErrCor');
  var divErrCon=document.getElementById('divErrCon');

  var verificador=true;

  if (correoIn.length==0) {

  	divErrCor.innerHTML="Digite un correo";
  	verificador=false;

  }else{

  		divErrCor.innerHTML=" ";

  }
  if (passIn.length==0) {

  	divErrCon.innerHTML="Digite una contraseña";
  	verificador=false;

  }else{

  	divErrCon.innerHTML=" ";

  }
  if (verificador==false) {

  	return false;

  } else{

  	return true;

  }
};

function ordenar(tipo){
	var carne=document.getElementById('sCar').value;
	var vegetales=document.getElementById('sVeg').value;
	var masa=document.getElementById('sMasa').value;
	var tamanho=document.getElementById('sTama').value;
	var resp=document.getElementById('divResp');

	 var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('carne='+carne+'&veg='+vegetales+'&masa='+masa+'&tamanho='+tamanho+'&tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Ordenado') {

				resp.innerHTML='<h1>Su orden ha sido guardada</h1> </br> <button id="btnCompras" onclick="redCompras()";>Ver Compras</button>';

			}
		}
	}
};



 function cargaLista(tipo){

 	var divOrd=document.getElementById('divVerOrden');

 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=="No hay datos") {

				divOrd.innerHTML="No hay compras hasta el momento";

			}else{

				var listaJson=JSON.parse(req.responseText);
				var data=' ';

				for (x in listaJson) {
					data+=listaJson[x].FECHA+"</br>"+listaJson[x].DESCRIPCION+"</br>"+listaJson[x].nombre+"</br>"+'₡'+listaJson[x].PRECIO_FINAL;
				}

				divOrd.innerHTML=data;
			}
		}
	}

 };

 function redCompras(){
 	window.location.href = 'verCompras.php';
 };

 function cerrarSesion(tipo) {
 	
 		var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Cerrado') {

				window.location.href = 'inicio.html';

			}else{

				alert('No se pudo cerrar la sesion');

			}
		}
	}
 };


 function cambiarCorreo(tipo) {

 	var correoCamb=document.getElementById('cambCorreo').value;
 	var divCamb=document.getElementById('divCambCor');

 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo+'&cambCorreo='+correoCamb);

	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Modificado') {

				divCamb.innerHTML=req.responseText;

			} else if (req.responseText=="Digite un correo") {

				divCamb.innerHTML="Digite un correo";

			} else if (req.responseText=="Error"){

				divCamb.innerHTML="Error de Base de Datos";
			}
		}
	}
 };

 function cambiarCon(tipo) {

 	var con=document.getElementById('cambCon').value;
 	var divCambCon=document.getElementById('divCambCon');
 	
 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo+'&cambCon='+con);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Modificado') {

				divCambCon.innerHTML=req.responseText;

			} else if (req.responseText=="Digite una Contraseña") {

				divCambCon.innerHTML="Digite una Contraseña";

			}
			else if (req.responseText=="Error") {

				divCambCon.innerHTML="Error de Base de datos";

		  }
		}
	}
 };

 function eliminaCuenta(tipo) {

 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=='Borrado') {

				window.location.href='inicio.html';

			}
		}
	}
 };


 function generarPrecio(tipo){

 	var veg=document.getElementById('sVeg').value;
 	var masa=document.getElementById('sMasa').value;
 	var carne=document.getElementById('sCar').value;
 	var tam=document.getElementById('sTama').value;
 	var divPrecio=document.getElementById('divPrecio');

 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo+'&veg='+veg+'&masa='+masa+'&carne='+carne+'&tam='+tam);

 	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			divPrecio.innerHTML='Precio final: ₡'+req.responseText;
			
		}
	}

 }

