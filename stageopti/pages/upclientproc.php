<?php
session_start();

if(isset($_POST["edit"])){

    include("../dtb.php");


    

    
    
    $dao = new daoges();
    
    $cuser  = $_POST['username'];
    $cpassword  = $_POST['userpassword'];
    $email = $_POST['clientemail'];
    $nomc = $_POST['nomclient'];
    $adress = $_POST['adressclient'];
    $ville = $_POST['ville'];
    $codepostal  = $_POST['zipcode'];
    $cin = $_POST['CIN'];
    $tele =$_POST['clientphone'];

    $dao->updateclient($cuser,$cpassword,$email,$nomc,$adress,$ville,$codepostal,$cin,$tele);
    $sql = $dao->connexion();

    $log = $sql->query("SELECT * FROM tclient WHERE cuser = '$cuser'");

    
    if($log->rowCount()  == 0 ){
         header("location:../update.php?msg=0");
    }
    else{
         header("location:../update.php?msg=1");

    }

    




}


?>