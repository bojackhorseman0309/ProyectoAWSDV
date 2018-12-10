 
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
  	document.getElementById('div2ErrNom').style.display="block";
  	verificador=false;

  }else{

  	divErrNom.innerHTML=" ";
  	document.getElementById('div2ErrNom').style.display="none";


  }

  if (passReg.length==0) {

  	divErrCon.innerHTML="Digite una contraseña";
  	document.getElementById('div2ErrCon').style.display="block";
  	verificador=false;

  }else{

  	divErrCon.innerHTML=" ";
  	document.getElementById('div2ErrCon').style.display="none";

  }

  if (apelReg.length==0) {

  	divErrAp.innerHTML="Digite un apellido";
  	document.getElementById('div2ErrAp').style.display="block";
  	verificador=false;

  }else{

  	divErrAp.innerHTML=" ";
  	document.getElementById('div2ErrAp').style.display="none";

  }

  if (correoReg.length==0) {

  	divErrCor.innerHTML="Digite un correo";
  	document.getElementById('div2ErrCor').style.display="block";
  	verificador=false;

  }else{

  	divErrCor.innerHTML=" ";
  	document.getElementById('div2ErrCor').style.display="none";


  }

  if (telReg.length==0) {

  	divErrTel.innerHTML="Digite un telefono";
  	document.getElementById('div2ErrTel').style.display="block";
  	verificador=false;

  }else{

  	divErrTel.innerHTML=" ";
  	document.getElementById('div2ErrTel').style.display="none";
 

  }

  if (dirReg.length==0) {

  	divErrDir.innerHTML="Digite una direccion";
  	document.getElementById('div2ErrDir').style.display="block";
  	verificador=false;

  }else{

  	divErrDir.innerHTML=" ";
  	document.getElementById('div2ErrDir').style.display="none";
 

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

				document.getElementById('divRespIni').style.display="none";
				window.location.href = 'inicioUsuario.php';

			} else if(req.responseText=="Ha fallado la autenticacion"){

				document.getElementById('divRespIni').style.display="block";
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
  	document.getElementById('divErrCor').style.display="block";
  	document.getElementById('divRespIni').style.display="none";
  	verificador=false;

  }else{

  	divErrCor.innerHTML=" ";
  	document.getElementById('divErrCor').style.display="none";

  }
  if (passIn.length==0) {

  	divErrCon.innerHTML="Digite una contraseña";
  	document.getElementById('divErrCon').style.display="block";
  	document.getElementById('divRespIni').style.display="none";
  	verificador=false;

  }else{

  	divErrCon.innerHTML=" ";
  	document.getElementById('divErrCon').style.display="none";

  }
  if (verificador==false) {

  	return false;

  } else{

  	return true;

  }
};

function ordenar(tipo){
	document.getElementById('divPrecio').setAttribute("style", "hidden");
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

				resp.innerHTML='<h1 style="color: white">Su orden ha sido guardada</h1> </br> <button id="btnCompras" onclick="redCompras()"; class="btn btn-success">Ver Compras</button>';

			}
		}
	}
};



 function cargaLista(tipo){

 	var divOrd=document.getElementById('divVerOrden');
 	var divNo=document.getElementById('divNo');
 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo);

	req.onreadystatechange = function(){

		if (req.readyState == 4 && req.status==200) {

			if (req.responseText=="No hay datos") {

				divNo.innerHTML="No hay compras hasta el momento";

			}else{

				var listaJson=JSON.parse(req.responseText);
				var data=' ';
				var aux='';
				aux+="<table border='1' width='200' id='tab'>";
				aux+="<tr><th>Fecha</th><th>Descripcion</th><th>Nombre del Cliente</th><th>Precio</th></tr>";

				for (x in listaJson) {
					aux+="<tr><td>" + listaJson[x].FECHA + "</td><td>" + listaJson[x].DESCRIPCION + "</td><td>" + listaJson[x].nombre +"</td> <td>"+'₡'+listaJson[x].PRECIO_FINAL+"</td></tr>";
					//data+=listaJson[x].FECHA+"</br>"+listaJson[x].DESCRIPCION+"</br>"+listaJson[x].nombre+"</br>"+'₡'+listaJson[x].PRECIO_FINAL;
				}
				aux+="</table>";
				divOrd.innerHTML=aux;
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

				document.getElementById('divCambCor').style.display="block";
				divCamb.innerHTML=req.responseText;

			} else if (req.responseText=="Digite un correo") {

				document.getElementById('divCambCor').style.display="block";
				divCamb.innerHTML="Digite un correo";

			} else if (req.responseText=="Error"){
				document.getElementById('divCambCor').style.display="block";
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

				document.getElementById('divCambCon').style.display="block";
				divCambCon.innerHTML=req.responseText;

			} else if (req.responseText=="Digite una Contraseña") {

				document.getElementById('divCambCon').style.display="block";
				divCambCon.innerHTML="Digite una Contraseña";

			}
			else if (req.responseText=="Error") {

				document.getElementById('divCambCon').style.display="block";
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

 	document.getElementById('divPrec').setAttribute("style", "hidden");

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
			document.getElementById('divPrec').setAttribute("style", "visible");

			divPrecio.innerHTML='Precio final: ₡'+req.responseText;
			
		}
	}

 }




