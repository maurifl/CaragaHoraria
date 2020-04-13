<?php 
    //recuperar variables
    $commit = $_POST['commit'];
    $hora = $_POST['hora'];

    //conectar al servidor y verificar
    try{
        $conn=new PDO('mysql:host=127.0.0.1:3306/; dbname=calculohora', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $sql="INSERT INTO comm (hora_comm, comentario_comm) VALUES (:hora_com, :comentario_com)";
        $result=$conn->prepare($sql);
        $result->execute(array(":hora_com"=>$hora, ":comentario_com"=>$commit));
        header("location: index.html");
    }
    catch(Exception $e){
        die('ERROR: ' . $e->GetMessage());
        header("location: cuenta.html");
    }
    finally{
        $conn=null;
    }

    /*
    //$nombre = $_POST['nombre'];
    //$telefono = $_POST['telefono'];
    //$mail = $_POST['mail'];
    //$estado=$_POST['estado']=1;
    */
?>