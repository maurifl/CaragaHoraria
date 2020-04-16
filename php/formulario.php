<?php 
    //recuperar variables
    $commit1 = $_POST['commit1'];
    $commit2 = $_POST['commit2'];
    $commit3 = $_POST['commit3'];
    $commit4 = $_POST['commit4'];
    $commit5 = $_POST['commit5'];
    $commit6 = $_POST['commit6'];
    $commit7 = $_POST['commit7'];
    $commit8 = $_POST['commit8'];
    $commit9 = $_POST['commit9'];
    $commit10 = $_POST['commit10'];
    $commit11 = $_POST['commit11'];
    $commit12 = $_POST['commit12'];
    $commit13 = $_POST['commit13'];
    $commit14 = $_POST['commit14'];
    $commit15 = $_POST['commit15'];
    $commit16 = $_POST['commit16'];
    $commit17 = $_POST['commit17'];
    $commit18 = $_POST['commit18'];
    $commit19 = $_POST['commit19'];
    $commit20 = $_POST['commit20'];
    $commit21 = $_POST['commit21'];
    
    $hora1 = $_POST['hora1'];
    $hora2 = $_POST['hora2'];
    $hora3 = $_POST['hora3'];
    $hora4 = $_POST['hora4'];
    $hora5 = $_POST['hora5'];
    $hora6 = $_POST['hora6'];
    $hora7 = $_POST['hora7'];
    $hora8 = $_POST['hora8'];
    $hora9 = $_POST['hora9'];
    $hora10 = $_POST['hora10'];
    $hora11 = $_POST['hora11'];
    $hora12 = $_POST['hora12'];
    $hora13 = $_POST['hora13'];
    $hora14 = $_POST['hora14'];
    $hora15 = $_POST['hora15'];
    $hora16 = $_POST['hora16'];
    $hora17 = $_POST['hora17'];
    $hora18 = $_POST['hora18'];
    $hora19 = $_POST['hora19'];
    $hora20 = $_POST['hora20'];
    $hora21 = $_POST['hora21'];
    

    //conectar al servidor y verificar
    try{
        $conn=new PDO('mysql:host=127.0.0.1:3306/; dbname=calculohora', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        $conn->exec("SET CHARACTER SET utf8");

        $sql="INSERT INTO horas (horario1_horas, comentario1_horas, horario2_horas, comentario2_horas,
                                  horario3_horas, comentario3_horas, horario4_horas, comentario4_horas,
                                  horario5_horas, comentario5_horas, horario6_horas, comentario6_horas,
                                  horario7_horas, comentario7_horas, horario8_horas, comentario8_horas,
                                  horario9_horas, comentario9_horas, horario10_horas, comentario10_horas,
                                  horario11_horas, comentario11_horas, horario12_horas, comentario12_horas,
                                  horario13_horas, comentario13_horas, horario14_horas, comentario14_horas,
                                  horario15_horas, comentario15_horas, horario16_horas, comentario16_horas,
                                  horario17_horas, comentario17_horas, horario18_horas, comentario18_horas,
                                  horario19_horas, comentario19_horas, horario20_horas, comentario20_horas,
                                  horario21_horas, comentario21_horas) 
                          VALUES (:hora1_hr, :comm1_hr, :hora2_hr, :comm2_hr, 
                                  :hora3_hr, :comm3_hr, :hora4_hr, :comm4_hr,
                                  :hora5_hr, :comm5_hr, :hora6_hr, :comm6_hr, 
                                  :hora7_hr, :comm7_hr, :hora8_hr, :comm8_hr,
                                  :hora9_hr, :comm9_hr, :hora10_hr, :comm10_hr, 
                                  :hora11_hr, :comm11_hr, :hora12_hr, :comm12_hr,
                                  :hora13_hr, :comm13_hr, :hora14_hr, :comm14_hr, 
                                  :hora15_hr, :comm15_hr, :hora16_hr, :comm16_hr,
                                  :hora17_hr, :comm17_hr, :hora18_hr, :comm18_hr, 
                                  :hora19_hr, :comm19_hr, :hora20_hr, :comm20_hr,
                                  :hora21_hr, :comm21_hr)";
        $result=$conn->prepare($sql);

          $result->execute(array(":hora1_hr"=>$hora1, ":comm1_hr"=>$commit1, ":hora2_hr"=>$hora2, ":comm2_hr"=>$commit2,
                                 ":hora3_hr"=>$hora3, ":comm3_hr"=>$commit3, ":hora4_hr"=>$hora4, ":comm4_hr"=>$commit4,
                                 ":hora5_hr"=>$hora5, ":comm5_hr"=>$commit5, ":hora6_hr"=>$hora6, ":comm6_hr"=>$commit6,
                                 ":hora7_hr"=>$hora7, ":comm7_hr"=>$commit7, ":hora8_hr"=>$hora8, ":comm8_hr"=>$commit8,
                                 ":hora9_hr"=>$hora9, ":comm9_hr"=>$commit9, ":hora10_hr"=>$hora10, ":comm10_hr"=>$commit10,
                                 ":hora11_hr"=>$hora11, ":comm11_hr"=>$commit11, ":hora12_hr"=>$hora12, ":comm12_hr"=>$commit12,
                                 ":hora13_hr"=>$hora13, ":comm13_hr"=>$commit13, ":hora14_hr"=>$hora14, ":comm14_hr"=>$commit14,
                                 ":hora15_hr"=>$hora15, ":comm15_hr"=>$commit15, ":hora16_hr"=>$hora16, ":comm16_hr"=>$commit16,
                                 ":hora17_hr"=>$hora17, ":comm17_hr"=>$commit17, ":hora18_hr"=>$hora18, ":comm18_hr"=>$commit18,
                                 ":hora19_hr"=>$hora19, ":comm19_hr"=>$commit19, ":hora20_hr"=>$hora20, ":comm20_hr"=>$commit20,
                                 ":hora21_hr"=>$hora21, ":comm21_hr"=>$commit21));

        echo "registro insertado";
        header("location: ../formulario.html");
    }
    catch(Exception $e){
        die('ERROR: ' . $e->GetMessage());
        header("location: ../cuenta.html");
    }
    finally{
        $conn=null;
    }
?>