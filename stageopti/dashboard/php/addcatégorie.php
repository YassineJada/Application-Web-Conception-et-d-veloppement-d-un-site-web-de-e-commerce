<?php
 include("../dtb.php");
    
if(isset($_POST['catbtn'])){
   
  $Cnom = $_POST["nomecate"];
  $Cdesc = $_POST["desc"];

 

  $Cimage=$_FILES["imagepath"]["tmp_name"];
  $destination="img/categories/".$Cnom .".jpg";
  move_uploaded_file($Cimage,$destination);


 
  $dao = new daoges();
  $sqldt = $dao->connexion();

   $dao->addcate($Cnom,$Cdesc,$destination);

    
  
      $msg = "Nous avons bien reçu votre demande, veuillez attendre notre appel pour confirmer";
      header('location:../content/catégories.php?msg=1');

   }
?>