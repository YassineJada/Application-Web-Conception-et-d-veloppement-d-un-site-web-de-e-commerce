<?php
 include("../dtb.php");
 $dao = new daoges();

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $dao->deleteprude($pid);
    header('location:../content/lesproduites.php');
}

if(isset($_GET['nomcat'])){
    $nomcat = $_GET['nomcat'];
    $dao->deletecat($nomcat);
    header('location:../content/catégories.php');
}

if(isset($_GET['ntype'])){
    $ntp =$_GET['ntype'];
    $dao->deletetype($ntp);
    echo "hello";
   header('location:../content/lesproduites.php?msgt=1');

}




?>