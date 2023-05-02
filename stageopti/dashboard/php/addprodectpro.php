<?php
 include("../dtb.php");
 $dao = new daoges();




    
if(isset($_POST['btn'])){
   
  $Ptitre = $_POST["Titre"];
  $Pcate = $_POST["Categ"];
  $Pquant = $_POST["quantité"];
  $Pdest = $_POST["discription"];
  $Ptype = $_POST["type"];
  $Pdiscount = $_POST["discont"];
  $Pachhat = $_POST["prixa"];
  $Pvent = $_POST["prixv"];
  $Ptva = $_POST["tva"];
  

 

    require ('../tc-lib-barcode/vendor/autoload.php');
    $barcode = new \Com\Tecnick\Barcode\Barcode();
    $targetPath = "../../img/barcode/";
    
    if (! is_dir($targetPath)) {
        mkdir($targetPath, 0777, true);
    }
    
    $productData = "098{$Pquant}";
    $barcode = new \Com\Tecnick\Barcode\Barcode();
    $bobj = $barcode->getBarcodeObj('C128C', "{$productData}", 450, 70, 'black', array(0, 0, 0, 0));
    
    
    $imageData = $bobj->getPngData();
    $timestamp = time();
    
    file_put_contents($targetPath . $Ptitre . '.png', $imageData);


 

  $sqldt = $dao->connexion();
  
   $dao->addprude($Ptitre,$Pcate,$Pquant,$Pdiscount,$Pvent,$Pachhat,$Ptype,$Pdest,$Ptva);

   $proid = $sqldt->query("SELECT * FROM produit WHERE ptitre = '$Ptitre'  ");
   $monres = $proid->fetch();

   $Ppid = $monres['pid'];

   
  $Cimage=$_FILES["prodim1"]["tmp_name"];
  $destination1real="../../img/produits/".$Ppid ."1.jpg";
  $destination1="img/produits/".$Ppid ."1.jpg";
  move_uploaded_file($Cimage,$destination1real);

  $Cimage=$_FILES["prodim2"]["tmp_name"];
  $destination2real="../../img/produits/".$Ppid ."2.jpg";
  $destination2="img/produits/".$Ppid ."2.jpg";
  move_uploaded_file($Cimage,$destination2real);

  $Cimage=$_FILES["prodim3"]["tmp_name"];
  $destination3real="../../img/produits/".$Ppid ."3.jpg";
  $destination3="img/produits/".$Ppid ."3.jpg";
  move_uploaded_file($Cimage,$destination3real);





  if($destination1!="" && $destination1!="" && $destination1!="" ){
   $dao->iserpruduitimages($Ptitre , $destination1, $destination2,$destination3);
 }

   


   if($proid->rowCount() > 0) $promsg = 1; else $promsg = 0;
  
      //$msg = "Nous avons bien reçu votre demande, veuillez attendre notre appel pour confirmer";
      header("location:../content/lesproduites.php?promsg='$promsg'");

   }
?>