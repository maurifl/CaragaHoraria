function validaIndex(){
    var dni, contraseña;
    dni=document.getElementById("dni").value;
    contraseña=document.getElementById("contraseña").value;

    /******************** VERIFICA QUE ESTE LLENO ********************/

    if(dni==='' || contraseña==='')
    {
        alert("Debe completar TDOS los campos, inténtelo nuevamente.");
        dni = document.getElementById("dni").focus();
        return false;
    }
    
    /******************** DNI ********************/

    if((dni.length>8)||(isNaN(dni)))
    {
        alert("El DNI ingresado no pertenece a un usuario o requiere solamente números, intentelo nuevamente.");
        document.getElementById("dni").value="";
        dni=document.getElementById("dni").focus();
        return false;
    }

    /******************** CONTRASEÑA ********************/

    if(contraseña.length>20)
    {
        alert("La CONTRASEÑA ingresada no pertenece a un usuario o sobrepasa el limite, intentelo nuevamente.");
        document.getElementById("contraseña").value="";
        contraseña=document.getElementById("contraseña").focus();
        return false;
    }
}