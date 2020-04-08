function validaRecupera(){
    var nombre, mail, expresion;
    nombre=document.getElementById("nombre").value;
    mail=document.getElementById("mail").value;

    expresion = '^[a-zA-Z0-9_.+-]+@osde.com.ar';    

    /******************** VERIFICA QUE ESTE LLENO ********************/

    if(nombre==='' || mail==='')
    {
        alert("Debe completar TDOS los campos, inténtelo nuevamente.");
        dni = document.getElementById("mail").focus();
        return false;
    }
    
    /******************** NOMBRE ********************/

    if(nombre.length>40)
    {
        alert("El NOMBRE ingresado no pertenece a un usuario, intentelo nuevamente.");
        document.getElementById("nombre").value="";
        nombre=document.getElementById("nombre").focus();
        return false;
    }

    /******************** E-MAIL ********************/

    if(mail.length>50){
        alert("El E-MAIL ingresado supera el límite máximo, intentelo nuevamente.");
        document.getElementById("mail").value="";
        mail=document.getElementById("mail").focus();
        return false;
    }

    function validarEmail(mail){
        return expresion.test(mail) ? true : false;
    }   

    if(!validarEmail(mail)){
        alert("El E-MAIL ingresado no es válido, intentelo nuevamente.");
        document.getElementById("mail").value="";
        mail=document.getElementById("mail").focus();
        return false;
    }
}