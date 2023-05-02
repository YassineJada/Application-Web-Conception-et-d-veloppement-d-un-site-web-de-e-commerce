<?php

session_start();
if(!isset($_SESSION['user'])){
  
    header('location:../login.php');
  
  
  }

include("dtb.php");
$dao = new daoges();

$nbprud= $dao->nombreprudect("");
$nbrcat= $dao->nombrecat();
$nbrcommande= $dao->nombrecommande("");


$catliste = $dao->listecat();
$typeliste = $dao->slecttype();


// liste prodect gestion 
if(isset($_GET['Search']))
{
    $pid = $_GET["pidpro"];
    $nbr = $dao->nombreprudect($pid);
    if($nbr >0) $lst=$dao->listeprudect($pid);
    

}else{
    $nbr = $dao->nombreprudect("");
    if($nbr >0) $lst=$dao->listeprudect("");
    
}

if(isset($_GET['commandSearch'])){

    $nomcom = $_GET["commandnum"];
    $nbrC = $dao->nombrecommande($nomcom);
    if($nbrC >0) $lst2=$dao->listecommand($nomcom);
}else{

    if(isset($_GET['cstatus'])){
        $stat= $_GET['cstatus'];
        $bdd = $dao->connexion();
        $respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.cstatus = '$etat' ");
        $nbrC = $respose->rowCount();
        if($nbrC > 0) $lst2=$dao->listeparetat($stat);
    }else
    {
        $nbrC = $dao->nombrecommande("");
        if($nbrC > 0) $lst2=$dao->listecommand("");
    }
    

  
  
}



?>

<section id="container">
        <aside id="asidemenu">
            <div class="box">
                <div class="icon">
                    <a href="index.php"><i class="fas fa-chart-line st"></i></a>
                    <h3>static</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                    <a href="content/lesproduites.php"><i class="fab fa-product-hunt st"></i>  </a>                  
                     <h3>Produits</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                <a href="content/catégories.php"><i class="fas fa-crosshairs st"></i></a>
                    <h3>Catégorie</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                    <a href="content/lescommandes.php"><i class="fas fa-boxes st"></i></a>
                    <h3>Commandes</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                    <a href="content/clientliste.php"><i class="fas fa-boxes st"></i></a>
                    <h3>Client</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                    <a href="content/administration.php"><i class="fas fa-user-cog st"></i></a>
                    <h3>Settings</h3>
                </div>
            </div>

            <div class="box">
                <div class="icon">
                    <a href="php/dropsession.php"><i class="fas fa-sign-out-alt st"></i></a>
                    <h3>Log Out</h3>
                </div>
            </div>
          
            
        </aside>

        <div id="leftside">
            <nav id="navig">
                <div class="clock">
                    <i class="fas fa-calendar-alt icuser"></i>
                    <h3> <?php  echo   date("Y-m-d"); ?> 00:00</h3>
                </div>
                
                <div class="adm">
                <i class="fas fa-user icuser"></i>
                <a href="" class="admusername"><?php  echo   $_SESSION['name'] ?></a>
                </div>
            </nav>
                
