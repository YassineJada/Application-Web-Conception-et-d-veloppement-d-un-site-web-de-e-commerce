<?php
session_start();

if(isset($_POST["Enter"])){

    include("../dtb.php");


    $login = $_POST["user"];
    $password = $_POST["pass"];

    
    
    $dao = new daoges();
    
   

    if($dao->lofincltrait($login,$password) == 1){
       
    $list = $dao->returnclientinfo($login);
 


     foreach( $list as $lst  ){
             $_SESSION['clientuser']  =   $lst[0];
           
        
        }
        
       header("location:../index.php");
       


    }else{
        $msg ="User Name Or password n'est pas validé ";
        header("location:../logincl.php?type=login&msg=$msg");
    }




}


?>