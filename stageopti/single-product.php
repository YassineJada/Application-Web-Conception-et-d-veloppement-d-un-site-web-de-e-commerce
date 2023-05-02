<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>Jesco - Fashoin eCommerce HTML Template</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/png">


    <!-- vendor css (Icon Font) -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.css" />

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/plugins/venobox.css" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/produitpage.css">

</head>

<body>

    <!-- Top Bar -->
    <?php   include("header.php") ;  ?>

    <?php




$i=0;


// liste prodect gestion 
if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];

    
    $bdd = $dao->connexion();

    $respose = $bdd->query("SELECT * FROM produit WHERE pid = $pid  ");
   
  //  $ligne=$dao->listeprudect($pid);
    $ligne = $respose->fetch();
    $respose2 = $bdd->query("SELECT * FROM prodimages WHERE pid = $pid  ");
    $ligne2 = $respose2->fetch();
    

    $ptyp = $ligne['ptype'];
    $unite =  $bdd->query("SELECT * FROM typeproduite WHERE ntype= '$ptyp'");
    $ligne3 = $unite->fetch();
}
?>
    <div id="content">
    <section id="prodectzone">


        <div id="slider2">
             <div class="w" onclick="backslide();"> <button></button></div>
             <div class="w l" onclick="nextslide();"><button></button></div>
        </div>

            <script >
            var k=0;
                var colle = [];
                
                <?php
                if($ligne2['imgpath']!=""){
                    ?> 
                    colle[0] = 'url(<?php echo $ligne2['imgpath']; ?>)';
                    

                     <?php
                }
                ?>  

                <?php
                if($ligne2['imgpath']!=""){
                    ?> 
                    colle[1] = 'url(<?php echo $ligne2['img2']; ?>)';

                     <?php
                }
                ?>  

                <?php
                if($ligne2['imgpath']!=""){
                    ?> 
                    colle[2] = 'url(<?php echo $ligne2['img3']; ?>)';

                     <?php
                }
                ?>  

                document.getElementById('slider2').style.backgroundImage = colle[0];    


                function nextslide(){
                    if(k == colle.length ){
                        k=0;
                    }

                    document.getElementById('slider2').style.backgroundImage = colle[k];
                    k++;
                }

                function backslide(){
                    
                    document.getElementById('slider2').style.backgroundImage = colle[k];
                    k--;
                    if(k < 0){k = colle.length -1 } 

                }


        </script>

        <div id="infoprod">

            <div class="salebtn"><h3>SALE</h3></div>
            <div class="dt titre">
                <p>Titre:</p>
                <hr>
                <h2><?php echo $ligne[1]; ?></h2>
            </div>
                
            <div class="dt prix">
                
               <h2><?php echo $dao->calcultprix($ligne['prixV'],$ligne['discount']) ." DH"; ?></h2> 

               <h2  class="was-price"><?php echo  $ligne['prixV'] ." DH"; ?></h2> 
            </div>
            <div class="dt discount">
            <p>Discount:</p>
                <hr>
                <h2><?php echo $ligne['discount'] ." %"; ?></h2>
                
            </div>

            <div class="dt quantité">
            <p>Piéce Valable:</p>
                <hr>
                <?php if($ligne['quantité']!=0) echo $ligne['quantité'] ." "  .$ligne3['unite'] ." valable " ; else echo "OUT OF STOCK !" ?>
                
            </div>



            <form method="post"  method="produit.php?action=add&pid=<?php echo $row[0]; ?>" class="dt qinpute">
            <input type="hidden" name="hidden_id" value="<?php echo $ligne[0]; ?>" />

            <input type="hidden" name="hidden_name" value="<?php echo $ligne[1]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo  $dao->calcultprix($ligne['prixV'],$ligne['discount']); ?>" />
            <input type="hidden" name="catégorie" value="<?php echo  $ligne['pcategorie']; ?>" />
            <input type="hidden" name="tva"  value="<?php echo  $ligne['tva']; ?>">
                <input name="quantity" min="0,00001" class="form-control" type="float" max="<?php echo $ligne['quantité']; ?>" placeholder="quantité" value="1"  required>
                <?php 
                if($ligne['quantité']==0){
                    ?>
                    <button type="submit" name="add_to_cart" type="button" class="btn btn-warning" disabled>ADD TO CART </button>
                    <?php 
                }else{
                    ?>
                    <button type="submit" name="add_to_cart" type="button" class="btn btn-warning" >ADD TO CART </button>
                    <?php 
                }
                ?>
                
                
                
            </form>


            <div class="dt discription">
            <p>Description:</p>
                <hr>
                <?php echo $ligne[8] ; ?>
                
            </div>


        </div>
        
        
   

</section>





    </div>

    <?php   include("foother.php") ;  ?>

   <!-- Vendor JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main Js -->
    <script src="assets/js/main.js"></script>
</body>

</html>