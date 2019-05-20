function buscarPorCedula() {
	var cedula = document.getElementById("cedula").value;
	
	if (cedula == "") {

		if (window.XMLHttpRequest) {
			//navegadores actuales
			xmlhttp = new XMLHttpRequest();
		} else {
			//navegadores que no soportan xmlhttp
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		//se encarga de recuperar la respuesta del send
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/mostrar.php?cedula="+cedula, true);
		xmlhttp.send();

	} else {

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("informacion").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../controladores/buscar.php?cedula="+cedula, true);
		xmlhttp.send();
	}
}