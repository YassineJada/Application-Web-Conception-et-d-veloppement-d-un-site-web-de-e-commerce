<?php



include("../dtb.php");
$dao = new daoges();

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
  $nbrC = $dao->nombrecommande("");
  if($nbrC > 0) $lst2=$dao->listecommand("");
  
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/footherstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/headerstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/prodectpage.css">
    <link rel="stylesheet" type="text/css" href="../css/addcate.css">
    <link rel="stylesheet" type="text/css" href="../css/addprouit.css">
    <link rel="stylesheet" type="text/css" href="../css/commandstule.css">
    <link rel="stylesheet" type="text/css" href="../css/typestyle.css">
    <title>Liste Produit </title>
    </head>
        <body>


           
            <?php   include("../content/gestioncategories.php")    ?>
            <?php   include("../content/gestiontype.php")    ?>
            <?php   include("../content/addproduitform.php")    ?>
            <?php   include("../content/gestprudect.php")    ?>

            <?php   include("../content/gestioncommand.php")    ?>


            
    
</body>
</html>