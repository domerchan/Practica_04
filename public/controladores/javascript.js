function validar(){
    var bandera = false;
    for (var i = 0; i<document.forms[0].length; i++){
        var elemento = document.forms[0].elements[i];
        if (elemento.value.trim() == ''){
            bandera = true;
            elemento.classList.add('error');
            break;
        }
    }
    if (bandera == true){
        alert('Llenar todos los campos');
        document.getElementById('p').classList.add('p');
        return false;
    } else {
        document.getElementById('p').classList.remove('p');
        if (validarCedula()) {
            return false;
        }
        return true;
    }
}

function escribe(elemento) {
    elemento.classList.remove('error');
}

function validarCedula() {
    var cedula = document.getElementById('ced').value.trim();
    if (cedula.substring(0, 2) > 24) {
        alert('Cédula no válida');
        return true;
    } else {
        return false;
    }
}