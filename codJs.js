 
function registrarse(tipo){

  var nomReg=document.getElementById('nomReg').value;
  var passReg=document.getElementById('conReg').value;
  var apelReg=document.getElementById('apel').value;
  var correoReg=document.getElementById('correo').value;
  var telReg=document.getElementById('tel').value;
   var dirReg=document.getElementById('dir').value
  var divResp=document.getElementById('resp');

  var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('usuario='+nomReg+'&contra='+passReg+'&apel='+apelReg+'&correo='+correoReg+'&tel='+telReg+'&dir='+dirReg+'&tipo='+tipo);

	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status==200) {
			if (req.responseText=='Registrado') {
				window.location.href = 'iniciarSesion.html'
			} else{
				alert('Error de Registro');
			}
			
		}
	}

}


	function iniciarSesion(tipo){

  var correoIn=document.getElementById('correoLog').value;
  var passIn=document.getElementById('conLog').value;
  var divRespIn=document.getElementById('respIni');

  var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('correoIn='+correoIn+'&contraIn='+passIn+'&tipo='+tipo);

	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status==200) {
			alert(req.responseText);
			if (req.responseText=='Ha ingresado correctamente') {
				window.location.href = 'inicioUsuario.php';
			}
		}
	}
}

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
			alert(req.responseText);
			if (req.responseText=='Ordenado') {
				resp.innerHTML='<h1>Su orden ha sido guardada</h1> </br> <button id="btnCompras" onclick="redCompras()";>Ver Compras</button>';
			}
		}
	}
}



 function cargaLista(tipo){

 	var divOrd=document.getElementById('divVerOrden');

 	var req = new XMLHttpRequest();
	req.open("POST", "procesos.php", true);
	req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	req.send('tipo='+tipo);

	req.onreadystatechange = function(){
		if (req.readyState == 4 && req.status==200) {
			var listaJson=JSON.parse(req.responseText);
			var data=' ';
			for (x in listaJson) {
				data+=listaJson[x].FECHA+"</br>"+listaJson[x].DESCRIPCION+"</br>"+listaJson[x].nombre+"</br>"+listaJson[x].PRECIO_FINAL;
			}
			divOrd.innerHTML=data;
		}
	}

 }

 function redCompras(){
 	window.location.href = 'verCompras.php';
 }

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
 }