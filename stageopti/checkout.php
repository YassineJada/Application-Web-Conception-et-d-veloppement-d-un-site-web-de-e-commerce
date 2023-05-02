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
    <link rel="stylesheet" type="text/css" href="assets/css/commandstl.css">

</head>

<body>

    <!-- Top Bar -->
    <?php   include("header.php") ;  ?>



<?php    
 if(!isset($_SESSION["shopping_cart"]) || !isset($_SESSION["clientuser"])){
    // header('location:index.php');
    ?>
    <script> location.replace("logincl.php"); </script>
    <?php
}

$user = $_SESSION["clientuser"];
$clientinfore = $sqlt->query("SELECT * FROM tclient WHERE cuser = '$user'");
$clientinfo = $clientinfore->fetch();


?>

<?php
 
if(sizeof($_SESSION["shopping_cart"])==0){
    // header('location:index.php');
    ?>
    <script> location.replace("index.php"); </script>
    <?php
}
?>




<table class="table table-dark table-striped" name="mainForm">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
                        <th width="20%">total</th>
       
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$totale = 0;
                        $totaltva = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>DH <?php echo $values["item_price"]; ?></td>
						<td>DH <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index.php?action=delete&pid=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							
                          
                                                    
                                $totale = $totale + (number_format($values["item_quantity"] * $values["item_price"], 2) )  ;
                                $totale = $totale + ($values["item_quantity"] * $dao->calcultva($values["item_price"],$values["item_tva"]));
                                $totaltva = $totaltva + $values["item_quantity"] *  $dao->calcultva($values["item_price"],$values["item_tva"]);
                                                   
						}
					?>
                    <tr>
						<td colspan="3" align="right">TVA: </td>
						<td align="right">DH <?php echo $totaltva; ?></td>
						<td></td>
					</tr>

                    <tr>
						<td colspan="3" align="right">Total : </td>
						<td align="right">DH <?php echo number_format($totale, 2); ?></td>
						<td></td>
					</tr>
					
					<?php
					}
					?>
						
    </table>

    <hr>
    

    <div class="cont">
    <form  class="cform" method="POST" action="Addcommandprocess.php">
                    <div class="form-group row">
                         <label for="example-text-input" class="col-2 col-form-label">Nom Complet : </label>
                     <div class="col-10">
                        <input class="form-control" required type="text" placeholder="Younes Bouchbouk" id="example-text-input" name="nomclient" value="<?php echo $clientinfo['nomc']  ?>">
                     </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Email :</label>
                     <div class="col-10">
                        <input class="form-control" required type="Email" placeholder="exemple@domain.com" id="example-email-input" name="clientemail" value="<?php echo $clientinfo['email']  ?>">
                     </div>
                    </div>
                <div class="form-group row">
                <label for="example-email-input" class="col-2 col-form-label">Telephone :</label>
                <div class="col-10">
                    <input class="form-control" required type="tel" placeholder="+212 65555555" id="example-email-input" name="clientphone" value="<?php echo $clientinfo['tele']  ?>">
                </div>
                </div>
                <div class="form-group row">
                <label for="example-url-input" class="col-2 col-form-label">Adress</label>
                <div class="col-10">
                    <input class="form-control" required type="text" placeholder="Rue .... quartier .... N" id="example-text-input" name="adressclient" value="<?php echo $clientinfo['adress']  ?>">
                </div>
                </div>
                <div class="form-group row">
                <label for="example-tel-input" class="col-2 col-form-label">Ville :</label>
                <div class="col-10">
                    <input class="form-control" type="text" placeholder="Agadir" id="example-text-input" name="ville" value="<?php echo $clientinfo['ville']  ?>" required>
                </div>
                </div>
                <div class="form-group row">
                <label for="example-url-input" class="col-2 col-form-label">Code Postal :</label>
                <div class="col-10">
                    <input class="form-control" type="text" placeholder="80000" id="example-text-input" name="zipcode"  value="<?php echo $clientinfo['codepostal']  ?>" required>
                </div>
                </div>
                <div class="form-group row">
                <label for="example-password-input" class="col-2 col-form-label">CIN :</label>
                <div class="col-10">
                    <input class="form-control" type="text" placeholder="JC12" id="example-text-input" name="CIN"  value="<?php echo $clientinfo['cin']  ?>" required >
                </div>
                </div>
                <div class="form-group row">
                <label for="example-number-input" class="col-2 col-form-label">Paiment</label>
                    <div class="col-10">
                    <select class="form-control form-control-lg" name="paiment" required>
                        <option value="COD" >selectioné</option>
                        <option value="COD" >COD </option>
                    </select>                
                    </div>

                    <div class="offset-sm-2 col-sm-10">
                     </div>
                </div>
                <div align="center">              
                  <button type="submit"  name="sub" class="btn btn-primary">Order Now</button>
                </div>


                
    </form>

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