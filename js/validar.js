function validar(){
    var dni, contraseña, nombre, telefono, mail, expresion;
    dni=document.getElementById("dni").value;
    contraseña=document.getElementById("contraseña").value;
    nombre=document.getElementById("nombre").value;
    telefono=document.getElementById("telefono").value;
    mail=document.getElementById("mail").value;

    expresion = '^[a-zA-Z0-9_.+-]+@osde.com.ar';

    /******************** VERIFICA QUE ESTE LLENO ********************/

    if(dni==='' || contraseña==='' || nombre==='' || telefono==='' || mail==='')
    {
        alert("Debe completar TDOS los campos, inténtelo nuevamente.");
        dni=document.getElementById("dni").focus();
        return false;
    }
    
    /******************** DNI ********************/

    if((dni.length>8)||(isNaN(dni)))
    {
        alert("El DNI ingresado supera el límite máximo o requiere solamente números, intentelo nuevamente.");
        document.getElementById("dni").value="";
        dni=document.getElementById("dni").focus();
        return false;
    }

    /******************** CONTRASEÑA ********************/

    if(contraseña.length>20)
    {
        alert("La CONTRASEÑA ingresada supera el límite máximo, intentelo nuevamente.");
        document.getElementById("contraseña").value="";
        contraseña=document.getElementById("contraseña").focus();
        return false;
    }

    /******************** NOMBRE ********************/

    if(nombre.length>40)
    {
        alert("El NOMBRE ingresado supera el límite máximo, intentelo nuevamente.");
        document.getElementById("nombre").value="";
        nombre=document.getElementById("nombre").focus();
        return false;
    }

    /******************** TELEFONO ********************/

    if((telefono.length>10)||(isNaN(telefono)))
    {
        alert("El TELEFONO ingresado supera el límite máximo o requiere solamente números, intentelo nuevamente.");
        document.getElementById("telefono").value="";
        telefono=document.getElementById("telefono").focus();
        return false;
    }

    /******************** EMAIL ********************/

    if((mail.length>20)||(!expresion.test(mail)))
    {
        alert("El E-MAIL ingresado supera el límite máximo o no es válido, intentelo nuevamente.");
        document.getElementById("mail").value="";
        mail=document.getElementById("mail").focus();
        return false;
    }
}