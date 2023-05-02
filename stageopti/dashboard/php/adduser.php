<?php
 include("../dtb.php");
 $dao = new daoges();
 $sqldt = $dao->connexion();

 if(isset($_GET['username'])){
     $user = $_GET['username'];
     $dao->deleteadm($user);
 }
    
if(isset($_POST['sub'])){
   
  $fnom = $_POST["fnom"];
  $email = $_POST["email"];
     
  $user = $_POST["user"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $type = $_POST["type"];
 
  
  


 


   $dao->insertadm($fnom,$password,$email,$user,$type);

    header("location:../content/administration.php");
}
?>