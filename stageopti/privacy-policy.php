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

</head>

<body>

    <!-- Top Bar -->

   

    <!-- Top Bar -->
    <!-- Header Area Start -->
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


    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Privacy Policy</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Privacy Policy</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!--Privacy Policy area start-->
    <div class="privacy_policy_main_area pb-100px pt-100px">
        <div class="container">
            <div class="container-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy_content section_1" data-aos="fade-up" data-aos-delay="200">
                            <h2>Who we are</h2>
                            <p>Our website address is: <a href="https://themeforest.net/user/hastech/portfolio">https://themeforest.net/user/hastech/portfolio</a></p>
                        </div>
                        <div class="privacy_content section_2" data-aos="fade-up" data-aos-delay="400">
                            <h2>What personal data we collect and why we collect it</h2>
                            <h3>Comments</h3>
                            <p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
                            <p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/.
                                After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>
                            <h3>Media</h3>
                            <p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>
                            <h3>Cookies</h3>
                            <p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment.
                                These cookies will last for one year.</p>
                            <p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>
                            <p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”,
                                your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>
                            <p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>
                            <h3>Embedded content from other websites</h3>
                            <p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>
                            <p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have
                                an account and are logged in to that website.</p>
                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="400">
                            <h2>How long we retain your data</h2>
                            <p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>
                            <p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change
                                their username). Website administrators can also see and edit that information.</p>
                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="400">
                            <h2>What rights you have over your data</h2>
                            <p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase
                                any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
                        </div>
                        <div class="privacy_content section_3" data-aos="fade-up" data-aos-delay="500">
                            <h2>Where we send your data</h2>
                            <p>Visitor comments may be checked through an automated spam detection service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Privacy Policy area end-->

    <?php   include("foother.php")    ?>

    <!-- Footer Area End -->

    <!-- Search Modal Start -->
 
    <!-- Search Modal End -->

    <!-- Login Modal Start -->
  
    <!-- Login Modal End -->

    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
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