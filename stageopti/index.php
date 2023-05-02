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
    <link rel="stylesheet" href="assets/css/mystyle.css" />


</head>

<body>

<?php   include("header.php") ;  




$sqlt = $dao->connexion();
$catliste = $dao->listecat();

if(isset($_GET['cattitle'])){
    $cat2 = $_GET['cattitle'];
    $prodect = $sqlt->query("SELECT * FROM produit  natural join prodimages WHERE pcategorie ='$cat2' ");

}else{
    $prodect = $sqlt->query("SELECT * FROM produit natural join prodimages ");
    $cat2="OUR";
}

$categorilimite = $sqlt->query("SELECT * FROM catégorie   LIMIT 5");


?>


    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    
    <!-- OffCanvas Menu End -->

    <!-- Hero/Intro Slider Start -->
    <div id="slider1img">
        
    </div>

    <script>
         
            var i=0;
            var imge = [];
            var timeout=4000;
            // ______________________________
            var textar =[];
            var j=0;


            imge[0] = 'url(slider/P1230068.JPG)';
            imge[1] = 'url(slider/P1230063.JPG)';
            imge[2] = 'url(slider/P1230067.JPG)';
            imge[3] = 'url(slider/P1230097.JPG)';
            imge[4] = 'url(slider/P1230098.JPG)';
            imge[5] = 'url(slider/P1230110.JPG)';
            imge[6] = 'url(slider/P1230124.JPG)';

            function changeim(){
            document.getElementById('slider1img').style.backgroundImage = imge[i];
            if(i < imge.length - 1){
            i++
            }else{
            i=0;
            }
            setTimeout ("changeim()", timeout);
            }
            window.onload = changeim();


    </script>

    <!-- Hero/Intro Slider End -->

    
    <!-- Feature Area End -->



    <!-- Product Area Start -->
    <div class="product-area">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg col-md col-12">
                    <div class="section-title mb-0">
                        <h2 class="title">Liste Produites</h2>
                    </div>
                </div>
                <!-- Section Title End -->

                
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <div class="row">
                <div class="col">
                    <div class="tab-content top-borber">


                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="tab-product-all">
                            <div class="row">                                

                                <?php
                                     while($ligh2 = $prodect->fetch() ){
                                ?>
                                

                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                    data-aos-delay="200" >
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="single-product.php?pid=<?php echo $ligh2['pid'] ?>" class="image">
                                                <img  src="<?php echo $ligh2['img2'] ?>" alt="Product"  />
                                               
                                            </a>
                                            <span class="badges">
                                                <span class="sale">-<?php echo $ligh2['discount']?>%</span>
                                                <span class="new">New</span>
                                            </span>
                                            
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                
                                            </span>
                                            <h5 class="title"><a href="single-product.php?pid=<?php echo $ligh2['pid'] ?>"><?php echo $ligh2['ptitre'] ?>
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new"><?php echo $dao->calcultprix($ligh2['prixV'],$ligh2['discount']) ." DH" ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <?php
                                }
                                ?>


                                 
                            </div>
                        </div>


                        


                        
                        <!-- 4th tab end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    <!-- Deal Area Start -->
    
    <!-- Deal Area End -->

    
    <?php   include("foother.php")    ?>

    <!-- Global Vendor, plugins JS -->

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