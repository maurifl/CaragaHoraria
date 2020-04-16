<?php 
    //VARIABLE GLOBALES
    date_default_timezone_set("America/Argentina/San_Juan");
    $d=date("d-m-Y");
    $t=time();
    $t=date("H:i:s", $t);

    //DATOS ENVIADOS DESDE HTML
    $pass = $_POST['contraseña'];
    

    session_start();
    try{
        //conectar al servidor y verificar
        $base=new PDO('mysql:host=127.0.0.1:3306/; dbname=calculohora', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT dni_usuario FROM usuario WHERE dni_usuario=:dni AND password_usuario=$pass"; 
        $resultado=$base->prepare($sql);
        $login=htmlentities(addslashes($_POST["dni"]));
        $resultado->bindValue(":dni", $login);
        $resultado->execute();
        $regis=$resultado->rowCount();
        if($regis!=0){
            try{        
                $sql="INSERT INTO logon (dni_login, password_login, fecha_login, hora_login, estado_login) VALUES (:dni_log, :password_log, :fecha_log, :hora_log, :estado_log)";
                $result=$base->prepare($sql);
                $result->execute(array(":dni_log"=>$login, ":password_log"=>$pass, ":fecha_log"=>$d, ":hora_log"=>$t, ":estado_log"=>1));
            }
            catch(Exception $e){
                die('ERROR: ' . $e->GetMessage());
            }    
            finally{
                $conn=null;
            } 
            header("location: ../formulario.html");            
        }else{
            try{        
                $sql="INSERT INTO logon (dni_login, password_login, fecha_login, hora_login, estado_login) VALUES (:dni_log, :password_log, :fecha_log, :hora_log, :estado_log)";
                $result=$base->prepare($sql);
                $result->execute(array(":dni_log"=>$login, ":password_log"=>$pass, ":fecha_log"=>$d, ":hora_log"=>$t, ":estado_log"=>0));
            }
            catch(Exception $e){
                die('ERROR: ' . $e->GetMessage());
            }    
            finally{
                $conn=null;
            } 
            header("location: ../index.html");
        }
    }
    catch(Exception $e){
        die('ERROR: ' . $e->GetMessage());
    }
    finally{
        $base=null;
    }

/*
CREATE VIEW [nombre vista] 
AS SELECT [campo] FROM [primera tabla],[otros campos] FROM [segunda tabla] 
INNER JOIN logon 
ON dni_login = dni_usuario.usuario;   
***************************************************************************

CODIGO	DESCRIPCIÓN
a	am o pm
A	AM o PM
d	Día del mes con ceros
D	Abreviatura del día de la semana (inglés)
F	Nombre del mes (inglés)
h	Hora en formato 1-12
H	Hora en formato 0-23
i	Minutos
j	Día del mes sin ceros
l	Dia de la semana
m	Número de mes (1-12)
M	Abreviatura del mes (inglés)
s	Segundos
y	Año con 2 dígitos
Y	Año con 4 dígitos
z	Dia del año (1-365)
*/
?>