<?php
 include("../dtb.php");
    
if(isset($_POST['catbtn'])){
   
  $ntype = $_POST["ntype"];
  $unite = $_POST["unite"];
  $description = $_POST["description"];

 




 
  $dao = new daoges();
  $sqldt = $dao->connexion();

   $dao->addtype($ntype,$unite,$description);

   $check =  $sqldt->query("SELECT * FROM typeproduite WHERE ntype='$ntype'");

  if($check->rowCount() > 0 ){
        $msg = 1;
  }else{
        $msg = 0;
  }
 
   
      header("location:../content/lesproduites.php?msgt=$msg");

   }else{
    header("location:../content/lesproduites.php");
   }
?>