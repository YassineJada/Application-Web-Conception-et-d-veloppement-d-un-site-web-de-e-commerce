<?php
 include("../dtb.php");
 $dao = new daoges();
 $sqldt = $dao->connexion();

 
if(isset($_GET['action'])){
   
  if($_GET['action'] == 'v'){
    if(isset($_GET['ncommand'])){
        $numc =$_GET['ncommand'];
        echo "hani hna";
      $dao->Expédié($numc);
    }


  }elseif($_GET['action'] == 'c'){
    if(isset($_GET['ncommand'])){
        $numc =$_GET['ncommand'];
        echo "hna tani anuu";
        $dao->annulé($numc);
    }

  }elseif($_GET['action'] == 's'){
    if(isset($_GET['ncommand'])){
        $numc =$_GET['ncommand'];
        $dao->cancel($numc);
    } 

    


  }elseif($_GET['action']=='a'){
    if(isset($_GET['ncommand'])){
      $numc =$_GET['ncommand'];
      $dao->retour($numc);
    }

  }

  
}

 header('location:../content/lescommandes.php?msgcom=1');


?>