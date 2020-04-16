<?php 
    //require './SendGrid/vendor/autoload.php';

    //VARIABLE GLOBALES
    date_default_timezone_set("America/Argentina/San_Juan");
    $d=date("d-m-Y");
    $t=time();
    $t=date("H:i:s", $t);

    //DATOS ENVIADOS DESDE HTML
    $mail = $_POST['mailrecupera'];

    session_start();
    try{
        //conectar al servidor y verificar
        $base=new PDO('mysql:host=127.0.0.1:3306/; dbname=calculohora', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT mail_usuario, password_usuario FROM usuario WHERE mail_usuario=:mailrecupera AND estado_usuario=1";

        $resultado=$base->prepare($sql);
        $login=htmlentities(addslashes($_POST['mailrecupera']));
        $resultado->bindValue(":mailrecupera", $login);
        $resultado->execute();

        $regis=$resultado->rowCount();
        if($regis!=0){
            try{        
                $sql="INSERT INTO recupera (mail_recupera, fecha_recupera, hora_recupera) VALUES (:mail_rec, :fecha_rec, :hora_rec)";
                $result=$base->prepare($sql);
                $result->execute(array(":mail_rec"=>$mail, ":fecha_rec"=>$d, ":hora_rec"=>$t));

                /************* ENVIO DE MAIL HACIA LA CUENTA DE RECUPERACION *************/


                







                $msn="Estimado usuario";
                $message="Hola estimado, nos solicitaste la recuperación de tu contraseña, esta es: ";

                $nombre_sale="Dante Fontana";
            
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("maurifl@gmail.com", $nombre_sale);   // desde donde va a salir
                $email->setSubject("E-Mail de recuperación");       //asunto
                $email->addTo($mail, $msn);        // donde va a llegar
                $email->addContent("text/plain", "Recuperación de clave");
                $email->addContent("text/html", "<strong>$message</strong>");    //cuerpo
                $sendgrid = new \SendGrid('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');
                try{
                    $response=$sendgrid->send($mail);
                        print $response->statusCode() . "\n";
                        print_r ($response->headers());
                        print $response->body() . "\n";
                }
                catch(Exception $e){
                    echo 'Excepción: '. $e->getMessage(). "\n";
                }










                /************* FIN ENVIO DE MAIL HACIA LA CUENTA DE RECUPERACION *************/
            }
            catch(Exception $e){
                die('ERROR: ' . $e->GetMessage());
            }    
            finally{
                $conn=null;
            } 
            //header("location: ../index.html");  

        }else{
            header("location: ../index.html");
        }
    }
    catch(Exception $e){
        die('ERROR: ' . $e->GetMessage());
    }
    finally{
        $base=null;
    }



    /*   include("class.phpmailer.php");
                include("class.smtp.php");
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->Username = "maurifl@gmail.com";
                $mail->Password = "pipoM4X5";
                $mail->From = "maurifl@gmail.com";
                $mail->FromName = "Lovemoon";
                $mail->Subject = "su usuario y contraseña";
                $mail->AltBody = "Hola, te doy tu usuario y contraseña:.";
                $mail->MsgHTML("Hola, te doy clave:<b>".$clave."</b>.");
                $mail->AddAddress($mail, "Destinatario");
                $mail->IsHTML(true);




               $recuperar=$_POST['recuperar'];
                
                if (!empty($_POST)) {
                    $conexion = mysql_connect('localhost','root','');
                    mysql_select_db('datos',$conexion);
                
                    $user = mysql_real_escape_string($_POST['recuperar']);
                
                    $sql = 'SELECT mail,usuario,contrasena FROM datos1 WHERE mail = \''.$user.'\'';
                    $query = mysql_query($sql,$conexion) or die(mysql_error());
                    $numUsers = mysql_num_rows($query);
                    if ($numUsers == 1){
                        while ($row = mysql_fetch_array($query)){
                            $mail=$row['mail'];
                            $usuario=$row['usuario'];
                            $clave=$row['contrasena'];
                        }
                        include("class.phpmailer.php");
                        include("class.smtp.php");
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;
                        $mail->SMTPSecure = "ssl";
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465;
                        $mail->Username = "trustjota@gmail.com";
                        $mail->Password = "eduardoxxx";
                        $mail->From = "trustjota@gmail.com";
                        $mail->FromName = "Lovemoon";
                        $mail->Subject = "su usuario y contraseña";
                        $mail->AltBody = "Hola, te doy tu usuario y contraseña:.";
                        $mail->MsgHTML("Hola, te doy tu usuario : ".$usuario." y clave:<b>".$clave."</b>.");
                        $mail->AddAddress($recuperar, "Destinatario");
                        $mail->IsHTML(true);
                        if(!$mail->Send()){
                            echo "Error: " . $mail->ErrorInfo;
                        }
                        else{
                            echo "Mensaje enviado correctamente";
                        }
                    }else{
                        echo "EMAIL INEXISTENTE";
                    }
                }*/



                /*$msn="Estimado usuario";
                $message="Hola estimado, nos solicitaste la recuperación de tu contraseña, esta es: ";

                $nombre_sale="Dante Fontana";
            
                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("maurifl@gmail.com", $nombre_sale);   // desde donde va a salir
                $email->setSubject("E-Mail de recuperación");       //asunto
                $email->addTo($mail, $msn);        // donde va a llegar
                $email->addContent("text/plain", "Recuperación de clave");
                $email->addContent("text/html", "<strong>$message</strong>");    //cuerpo
                $sendgrid = new \SendGrid('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');
                try{
                    $response=$sendgrid->send($mail);
                        print $response->statusCode() . "\n";
                        print_r ($response->headers());
                        print $response->body() . "\n";
                }
                catch(Exception $e){
                    echo 'Excepción: '. $e->getMessage(). "\n";
                }*/
?>