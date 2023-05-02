<?php

session_start();
include("dtb.php");
$dao = new daoges();


$sqlt = $dao->connexion();
$catliste = $dao->listecat();

$categorilimite = $sqlt->query("SELECT * FROM catégorie   LIMIT 5");



// Add to cart Gestion 
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["pid"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["pid"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
                'item_categorie'	=>	$_POST["catégorie"],
                'item_tva'          =>	$_POST["tva"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["pid"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
            'item_categorie'	=>	$_POST["catégorie"],
            'item_tva'          =>	$_POST["tva"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["pid"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}

$_SESSION['ordervalide']=0;



?>
    <!-- Top Bar -->

    <div class="header-to-bar">BONJOUR À TOUS! 25% de rabais sur certains produits </div>

    <!-- Top Bar -->
    <!-- Header Area Start -->
    <header>
        <div class="header-main sticky-nav ">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/logogo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <div class="col align-self-center d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.php">HOME</a></li>                                   
                                
                                <li class="dropdown position-static"><a href="#">Shop <i
                                            class="pe-7s-angle-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                
                                                
                                            </ul>
                                            <?php
                                                while($cate = $categorilimite->fetch() ){
                                                ?>
                                                <ul class="d-block">

                                                <li class="title"><a href="index.php?cattitle=<?php echo $cate[0] ?>"><?php echo $cate[0] ?></a></li>
                                                
                                                
                                                </ul>
                                                
                                                <?php
                                                }
                                                ?>
                                            
                                            
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Pages</a></li>
                                                <li><a href="404.html">Shipping Policy</a></li>
                                                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                                <li><a href="faq.html">Faq Page</a></li>
                                                <!-- <li><a href="coming-soon.html">Coming Soon Page</a></li> -->

                                            </ul>
                                        </li>
                                        <li>

                                            
                                        </li>
                                    </ul>
                                </li>
                                
                                <li><a href="about.php">About us</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Action Start -->
                    <div class="col col-lg-auto align-self-center pl-0">
                        <div class="header-actions">
                         <?php   if(!isset($_SESSION["clientuser"] )){
                             echo '<a href="login.php" class="header-action-btn login-btn" data-bs-toggle="modal"
                             data-bs-target="#loginActive">Sign In</a>';
                         }else{
                            echo '<a href="update.php" class="header-action-btn login-btn" >Mon compte</a>';

                            echo '<a href="pages/dropsess.php" class="header-action-btn login-btn">Logout</a>';
                         } ?>
                        
                            <!-- Single Wedge Start -->
                            <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                                <i class="pe-7s-search"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <!-- Single Wedge Start -->
                            
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num"><?php if(isset($_SESSION["shopping_cart"])) echo sizeof($_SESSION["shopping_cart"]); else echo "0"; ?></span>
                                <span class="cart-amount"><?php if(isset($total)) echo $total; else echo "0"; ?></span> 
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
    </header>

    
<div class="offcanvas-overlay"></div>
<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                

                <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
                    ?>
                    <li>
					<div class="content">
                        <a  class="title"><?php echo $values["item_name"]; ?></a>
                        <span class="quantity-price"><?php echo $values["item_quantity"]; ?>x <span class="amount"> <?php echo $values["item_price"]; ?>DH</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                    </li>
					<?php
                        }
                    }
                    ?>
                    
                
                    
                
                
                
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
                <a href="checkout.php" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>
    