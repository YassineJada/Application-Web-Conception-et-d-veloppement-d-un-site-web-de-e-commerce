
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page : </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- <link rel="stylesheet" type="text/css" href="../css/footherstyle.css"> -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/commvalide.css">
</head>
<body>





<?php


 session_start();
 include("dtb.php");
 $dao = new daoges();

 if(!isset($_SESSION["shopping_cart"])){
    // echo "makaynache";

 }

if(sizeof($_SESSION["shopping_cart"])==0){
//    echo "makauynche2";
}


 if(isset($_POST['sub'])){

    $nomclient = $_POST["nomclient"];
    $clientemail = $_POST["clientemail"];
    $clientphone = $_POST["clientphone"];
    $adressclient = $_POST["adressclient"];
    $ville = $_POST["ville"];
    $zipcode = $_POST["zipcode"];
    $CIN = $_POST["CIN"];
    $paiment = $_POST["paiment"];



    $time = $dao->todaytime();

    $ordernum =  mt_rand();


                      if(!empty($_SESSION["shopping_cart"]))
                      {
                          $total = 0;

                          foreach($_SESSION["shopping_cart"] as $keys => $values)
                              {
                              $total = $total + ($values["item_quantity"] * $values["item_price"]);
                              }




                          foreach($_SESSION["shopping_cart"] as $keys => $values)
                              {
                          $dao->addcommande($ordernum,$values["item_id"],$values["item_quantity"],number_format($values["item_quantity"] * $values["item_price"], 2),$nomclient,$adressclient,$paiment,$clientphone,$CIN,$clientemail,$ville,$zipcode,$time);

                              }
                      }





                      if($dao->nombrecommande($ordernum) != 0){
                          $_SESSION['ordervalide']=1;
                          $msg = "Nous avons bien reçu votre demande, veuillez attendre notre appel pour confirmer";


                          foreach($_SESSION["shopping_cart"] as $keys => $values)
                          {

                                  unset($_SESSION["shopping_cart"][$keys]);


                          }
                          ?>
                          <script>
                setTimeout(() => {
                    window.location.replace("example07.php?ncommand=<?php echo $ordernum   ?>  ");

                }, 2000);
                </script>
                        <?php


                      }else{
                          $_SESSION['ordervalide']=0;
                          $msg = "il y a un probléme dans votre command veuille revoire vos information";
                          #header('location:../pages/listeproduits.php');
                      }




     }


?>
<div id="content2">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
                </svg>


             <?php
                if($_SESSION['ordervalide']==1){
             ?>


                <div class="imgitat" align="center">
                    <img src="img/successfully.png" alt="successfully">
                </div>

                <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                 <div>
                 <?php  echo $msg ?>
                </div>

                <div>
                            Command N :   <?php  echo $ordernum ?>:
                </div>
                </div>

                 <!-- <script>
                setTimeout(() => {
                    window.location.replace("../index.php");

                }, 2000);
                </script> -->
             <?php
             }else{

             ?>
                <div  class="imgitat"  align="center">
                    <h1>OOOppps....</h1>
                    <img src="img/error.png" alt="error" >
                </div>

                <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                        <?php  echo $msg ?>
                </div>
                </div>
                 <!-- <script>
                setTimeout(() => {
                    window.location.replace("../Command.php");

                }, 3000);
                </script> -->
             <?php

            }

             ?>

</div>



</body>
</html>