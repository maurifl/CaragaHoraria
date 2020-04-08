<?php
    require './SendGrid/vendor/autoload.php';

    if($_SERVER['REMOTE_ADDR']=="00.00.00.00") { 
    ini_set('display_errors','Off'); 
	} 
	else { 
	    ini_set('display_errors','Off'); 
	} 

    $name=$_POST['nombre'];
    $mail=$_POST['mail'];
    $message=$_POST['mensaje'];

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($mail, $name);   // desde donde va a salir
    $email->setSubject("E-Mail desde website");       //asunto
    $email->addTo("maurifl@gmail.com", "Dante Fontana");        // donde va a llegar
    $email->addContent("text/plain", "Esto es una prueba al cuete");
    $email->addContent("text/html", "<strong>$message</strong>");    //cuerpo
    $sendgrid = new \SendGrid('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');

   try{
        $response=$sendgrid->send($email);
      //echo "<pre>";
            //print $response->statusCode() . "\n";
            //print_r($response->headers());
            //print $response->body() . "\n";
      //echo "<pre>";
    }
    catch(Exception $e){
        echo 'Caught exception: '. $e->getMessage(). "\n";
    }
?>