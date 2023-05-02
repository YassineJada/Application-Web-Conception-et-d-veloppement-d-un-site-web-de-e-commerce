<?php
session_start();

if(isset($_POST["Enter"])){

    include("../dtb.php");


    $login = $_POST["admin"];
    $password = $_POST["adminpassword"];

    echo $login;
    
    $dao = new daoges();
    
   

    if($dao->adminlogin($login,$password) == 1){
       
      $list = $dao->alladminstration($login);
 


    foreach( $list as $lst  ){
            $_SESSION['user']  =   $lst[0];
            $_SESSION['name']  =    $lst[2];
           $_SESSION['email']  =   $lst[1];
           $_SESSION['type']  =   $lst[3];
        
       }


        
        echo "loginsecsufily";
       header("location:../Dashboard/index.php");
       


    }else{
        $msg ="User Name Or password n'est pas validé ";
        header("location:../login.php?msg=$msg");
    }




}


?>