<?php 
    //recuperar variables
    $dni = $_POST['dni'];
    $pass = $_POST['contraseña'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $mail = $_POST['mail'];
    $estado=$_POST['estado']=1;

    //conectar al servidor y verificar
    try{
        $conn=new PDO('mysql:host=127.0.0.1:3306/; dbname=calculohora', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        $conn->exec("SET CHARACTER SET utf8");
        
        $sql="INSERT INTO usuario (dni_usuario, password_usuario, nombre_usuario, 
                                   telefono_usuario, mail_usuario, estado_usuario) 
              VALUES (:dni_usr, :password_usr, :nombre_usr, :telefono_usr, :mail_usr, :estado_usr)";
        $result=$conn->prepare($sql);
        $result->execute(array(":dni_usr"=>$dni, ":password_usr"=>$pass, ":nombre_usr"=>$nombre, 
                               ":telefono_usr"=>$telefono, ":mail_usr"=>$mail, ":estado_usr"=>$estado));
        //echo "registro insertado";
        header("location: ../index.html");
    }
    catch(Exception $e){
        die('ERROR: ' . $e->GetMessage());
        header("location: ../cuenta.html");
    }
    finally{
        $conn=null;
    }
?>