<?php
 include("../dtb.php");
 $dao = new daoges();




    
if(isset($_POST['btn'])){
  $pid = $_GET['pid'];
  $Ptitre = $_POST["Titre"];
  $Pcate = $_POST["Categ"];
  $Pquant = $_POST["quantité"];
  $Pdest = $_POST["discription"];
  $Ptype = $_POST["type"];
  $Pdiscount = $_POST["discont"];
  $Pachhat = $_POST["prixa"];
  $Pvent = $_POST["prixv"];
  $Ptva = $_POST["tva"];
 echo $pid;

  $Cimage=$_FILES["img1"]["tmp_name"];
  $destination1real="../../img/produits/".$pid ."1.jpg";
  $destination1="img/produits/".$pid ."1.jpg";
  move_uploaded_file($Cimage,$destination1real);

  $Cimage=$_FILES["img2"]["tmp_name"];
  $destination2real="../../img/produits/".$pid ."2.jpg";
  $destination2="img/produits/".$pid ."2.jpg";
  move_uploaded_file($Cimage,$destination2real);

  $Cimage=$_FILES["img3"]["tmp_name"];
  $destination3real="../../img/produits/".$pid ."3.jpg";
  $destination3="img/produits/".$pid ."3.jpg";
  move_uploaded_file($Cimage,$destination3real);

 

  $sqldt = $dao->connexion();
  
   $dao->updateproduite($pid,$Ptitre,$Pcate,$Pquant,$Pdiscount,$Pvent,$Pachhat,$Ptype,$Pdest,$Ptva);

   $testimg = $sqldt->query("SELECT * FROM prodimages WHERE pid = $pid");
   $nbe = $testimg->rowCount();
   echo $nbe;

   if($testimg->rowCount() == 0){
    if($destination1!="" && $destination1!="" && $destination1!="" ){
      $dao->iserpruduitimages2($pid , $destination1, $destination2,$destination3);
    }
    

   }else{
      $req = $sqldt->query("UPDATE prodimages SET imgpath = '$destination3' ,  img2 '$destination3' ,  img3 = '$destination3' WHERE pid = $pid");
      #echo "UPDATE prodimages SET imgpath = '$destination3' ,  img2 '$destination3' ,  img3 = '$destination3' WHERE pid = $pid";

   }



  
      //$msg = "Nous avons bien reçu votre demande, veuillez attendre notre appel pour confirmer";
      header('location:../content/lesproduites.php');

   }
?>