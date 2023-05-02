<?php



include("../dtb.php");
$dao = new daoges();

$catliste = $dao->listecat();



// liste prodect gestion 
if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];

    
    $bdd = $dao->connexion();

    $respose = $bdd->query("SELECT * FROM produit WHERE pid = $pid  ");
   
    $ligne = $respose->fetch();

  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite Produite : </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

 
</head>
<body>


<form id="prodectform" action="../php/editeprudect.php?pid=<?php echo $ligne[0]; ?>"  method="POST">
            <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Titre" name="Titre" value="<?php echo $ligne[1]; ?>">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="discription"   name="discription"  value="<?php echo $ligne[8]; ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control" placeholder="type"   name="type" value="<?php echo $ligne['ptype']; ?>" required>
          </div>
      </div>
      </div>

      <div class="form-group">

      <div class="row">
        <div class="col">
            <input type="number" name="prixa" class="form-control" placeholder="Prix achat DH" value="<?php echo $ligne['prixV']; ?>" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="prix a vendre  DH"   name="prixv" value="<?php echo $ligne['prixA']; ?>" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="quantité"   name="quantité"  value="<?php echo $ligne['quantité']; ?>">
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="discont %"   name="discont" value="<?php echo $ligne['discount']; ?>" >
        </div>
      </div>

     </div>



      <div class="row">

        <div class="col">
                <select class="form-control form-control-lg" name="Categ" required>
                    <option value="<?php echo $ligne[2]; ?>" ><?php echo $ligne[2]; ?></option>
                    <?php
                       foreach($catliste as $cate  ){
                    ?>
                    <option value="<?php echo $cate[0] ?>"><?php echo $cate[0] ?></option>

                    <?php

                    }
                    ?>
                    
                
                </select>
              </div>
    
       
        
      </div>


            <div class="btngroup">

         <button  class="btn btn-primary btn-lg btn-block" type="submit" name="btn">Ajouté</button>
         <button  class="btn btn-secondary btn-lg btn-block" type="reset">reset value</button>

           </div>
            </form>



            


            </body>
</html>