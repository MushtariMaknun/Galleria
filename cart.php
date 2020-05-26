<?php
    session_start();
    if(isset($_SESSION["Active"])){
       echo "";
    }
include("core/database.php");



if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],  
				'item_name'			=>	$_POST["hidden_name"],
                'item_image'		=>	$_POST["hidden_image"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["qtybutton"],
                'item_artist'		=>	$_POST["hidden_artist"],
                'item_type'		    =>	$_POST["hidden_type"]
                
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
			    'item_id'	        =>	$_GET["id"],  
				'item_name'			=>	$_POST["hidden_name"],
                'item_image'		=>	$_POST["hidden_image"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["qtybutton"],
                'item_artist'		=>	$_POST["hidden_artist"],
                'item_type'		    =>	$_POST["hidden_type"]
            
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
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}



?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Galleria || Cart </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Template color css -->
    <link href="css/color/color-core.css" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto">(+88) 01234-567890</p>
                            </div>
                        </div>
                       <div class="col-sm-6 col-xs-12" style="margin: 0px 0px -500px 0px">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    
                                    

                                    <?php 
                                    if(isset($_SESSION["Active"]) && isset($_SESSION["type"]))
                                    {
                                        if($_SESSION["type"]=="artist")
                                        {
                                            $id=$_SESSION["id"];
                                            $name=$_SESSION["uname"];
                                            echo "<li ><a href='profile.php?profile_id=$id'><i class='zmdi zmdi-account'></i>$name
                                            
                                                </a>
                                            </li>";
                                        }
                                        else if($_SESSION["type"]=="admin")
                                        {
                                            
                                            $name=$_SESSION["uname"];
                                            echo "<li ><a href='admin.php'><i class='zmdi zmdi-account'></i>$name
                                            
                                                </a>
                                            </li>";
                                            
                                        }
                                        else
                                        {
                                            $name=$_SESSION["uname"];
                                             echo "<li ><a href='#'><i class='zmdi zmdi-account'></i>$name
                                            
                                                </a>
                                            </li>";
                                        }
                                
    
                            }

                        
                            else{
                                echo '<li style="display:none">
                                        <a href="my-account.html">
                                            <i class="zmdi zmdi-account"></i>
                                            My Account
                                        </a>
                                    </li>';
                                        }
                                        ?>
                                    
                                    
                                 
                                    
                                      <li >
                                        
                                    </li>  
                                        
                                    <div class="total-cart f-left" style="margin:-22px 50px 30px 20px">
                                        
                                        
                                        <div class="total-cart-in" >
                                            <div class="cart-toggler" style="color:#F5F5F5">
                                                <li >
                                        <a href="login.php">
                                            <i class="zmdi zmdi-lock" style="color:#DCDCDC" ></i><span style="color:#DCDCDC"> Sign In</span> 
                                           
                                        </a>
                                      
                                    </li>                           
                                            </div >
                                            
                                            
                                            <?php 
                                            
                                            
                                            if(isset($_SESSION["Active"]) && isset($_SESSION["type"]))
                                             {
                                                    if($_SESSION["type"]=="customer")
                                                    {
                                                                $id=$_SESSION["id"];

                                                           echo "<ul style='margin:0px -120px 0px -120px '>

                                                            <li >
                                                                <div class='top-cart-inner view-cart' >
                                                                    <h5 >
                                                                        <a href='#'>Account Setting</a>
                                                                    </h5>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class='top-cart-inner check-out'>
                                                                    <h5 >
                                                                        <a href='order-history.php?cust_id=$id'>Order History</a>
                                                                    </h5>
                                                                </div>

                                                            </li>


                                                            <li>
                                                                <div class='top-cart-inner check-out'>
                                                                    <h5 >
                                                                        <a href='logout.php'>Log Out</a>
                                                                    </h5>
                                                                </div>



                                                            </li>
                                                        </ul>";
                                                    }
                                                else
                                                {
                                                    $id=$_SESSION["id"];

                                                           echo "<ul style='margin:0px -120px 0px -120px '>

                                                            <li >
                                                                <div class='top-cart-inner view-cart' >
                                                                    <h5 >
                                                                        <a href='#'>Account Setting</a>
                                                                    </h5>
                                                                </div>
                                                            </li>
                                                            

                                                            <li>
                                                                <div class='top-cart-inner check-out'>
                                                                    <h5 >
                                                                        <a href='logout.php'>Log Out</a>
                                                                    </h5>
                                                                </div>



                                                            </li>
                                                        </ul>";
                                                    
                                                    
                                                    
                                                }
    
                                                
                                                
    
                                            }
                                            
                                            else{
                                                
                                               echo "<ul style='margin:0px -120px 0px -120px ;display:none'>
                                               
                                                <li >
                                                    <div class='top-cart-inner view-cart' >
                                                        <h5 >
                                                            <a href='#'>Account Setting</a>
                                                        </h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class='top-cart-inner check-out'>
                                                        <h5 >
                                                            <a href='order-history.php'>Order History</a>
                                                        </h5>
                                                    </div>
                                                  
                                                </li>
                                                
                                                
                                                <li>
                                                    <div class='top-cart-inner check-out'>
                                                        <h5 >
                                                            <a href='logout.php'>Log Out</a>
                                                        </h5>
                                                    </div>
                                                    
                                                    
                                                    
                                                </li>
                                            </ul>"; 
                                                
                                            }
                                            ?>
                                            
                                            
                                          
                                        </div>
                                    </div>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo/logo3.jpg" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        
                                        <li class="mega-parent"><a href="shop.php?cat=all">Shop by Category</a>
                                            <div class="mega-menu-area clearfix">
                                                
                                                
                               
                                                <div class="mega-menu-link f-left">
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">Passion</li>
                                                        <li>
                                                            <a href="shop.php?cat=city">City</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=animal">Animals</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=cosmos">Cosmos</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=music">Music</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=nature">Nature</a>
                                                        </li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">Pop Culture</li>

                                                        <li>
                                                            <a href="shop.php?cat=movies">Movies</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=anime">Anime</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=80s">80s</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=comics">Comics</a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=fantasy">Fantasy</a>
                                                        </li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">Inspiration & Fun</li>
                                                        
                                                        
                                                        <li>
                                                            <a href="shop.php?cat=landscapes">Landscapes</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=cartoons">Cartoons</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=abstract">Abstract</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop.php?cat=travel">Travel</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                                <div class="mega-menu-photo f-left">
                                                    <a href="#">
                                                        <img src="img/product/abstract/friendship_tree.jpg" alt="mega menu image">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li class="mega-parent"><a href="shop.php?cat=multiframe">Multiframes</a></li>
                                         
                                        
                                        <li><a href="blog.html">Get Inspired</a></li>
                                          
                                        
                                        <li>
                                            <a href="about.html">About us</a>
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                             <?php
                                            
                                            echo "<form action='shop.php?check=1' method='POST'>
                                                <div class='top-search-box'>
                                                    <input type='text' name='search' placeholder='Tags...(ex. animal, nature, painting)'>
                                                    <button type='submit'>
                                                        <i class='zmdi zmdi-search'></i>
                                                    </button>
                                                </div>
                                            </form>"; 
                                                ?>
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="cart.php">
                                                    <span class="cart-quantity"></span><br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER AREA -->

        <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-50">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#" data-toggle="tab">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                             
                                <li>
                                    <a href="checkout.php" data-toggle="tab">
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-complete" data-toggle="tab">
                                        <span>03</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <!-- shopping-cart start -->
                                
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                       
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">subtotal</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php
                                                            if(!empty($_SESSION["shopping_cart"]))
                                                            {
                                                                $total = 0;
                                                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                                                {
                                                        ?>
                                                        
                                                       
                                                        
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="<?php echo $values["item_image"]; ?>" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#"><?php echo $values["item_name"]; ?></a>
                                                                    </h6>
                                                                    
                                                                </div>
                                                            </td>
                                                            <td class="product-price">TK. <?php echo $values["item_price"]; ?></td>
                                                            
                                                            <td class="product-quantity"><?php echo $values["item_quantity"]; ?></td>
                                                            
                                                          
                                                            <td class="product-subtotal">TK. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                                            
                                                            
                                                            
                                                            <td class="product-remove">
                                                                <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        <?php
							                             $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                         
                                                            
                                                         $order_total=$total+100;
                                                                   
						                              }
                                                    }
                                                                
                                               ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-md-7">
                                                    <div class="payment-details box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">payment details</h6>
                                                        <table>
                                                            
                                                            
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td class="td-title-2">TK. <?php 
                                                                    if(isset($total)){
                                                                       echo $total; 
                                                                    }
                                                                    else{
                                                                         echo "0.00";
                                                                    }
                                                                     ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Shipping and Handing</td>
                                                                <td class="td-title-2">TK. 100 </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price">TK. <?php 
                                                                    if(isset($order_total)){
                                                                       echo $order_total; 
                                                                    }
                                                                    else{
                                                                         echo "0.00";
                                                                    }
                                                                    
                                                                    ?></td>
                                                            </tr>
                                                            
                                                            
                                                            
                                                            
                                                        </table>
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                     <div style="float:right;margin-right: -10px">
                                                         
                                                         <a href='check_customer.php' class='button extra-small' >
                                                         <span class='text-uppercase' >checkout</span>
                                                         </a>;
                                                
                                                    </div>
                                                    
                                                    <div style="float:left;margin-right: -10px">
                                                        <a href="shop.php?cat=all" class="button extra-small" >
                                                        <span class="text-uppercase" >continue shopping</span>
                                                        </a>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                       
                                        
                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                <!-- wishlist start -->
                                <div class="tab-pane" id="wishlist">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-stock">Stock status</th>
                                                            <th class="product-add-cart">add to cart</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="img/cart/1.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="img/cart/2.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="img/cart/3.jpg" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">dummy product name</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">$560.00</td>
                                                            <td class="product-stock text-uppercase">in stoct</td>
                                                            <td class="product-add-cart">
                                                                <a href="#" title="Add To Cart">
                                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- wishlist end -->
                                <!-- checkout start -->
                                <div class="tab-pane" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form action="#">
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">billing details</h6>
                                                        <input type="text"  placeholder="Your Name Here...">
                                                        <input type="text"  placeholder="Email address here...">
                                                        <input type="text"  placeholder="Phone here...">
                                                        <input type="text"  placeholder="Company neme here...">
                                                        <select class="custom-select">
                                                            <option value="defalt">country</option>
                                                            <option value="c-1">Australia</option>
                                                            <option value="c-2">Bangladesh</option>
                                                            <option value="c-3">Unitd States</option>
                                                            <option value="c-4">Unitd Kingdom</option>
                                                        </select>
                                                        <select class="custom-select">
                                                            <option value="defalt">State</option>
                                                            <option value="c-1">Melbourne</option>
                                                            <option value="c-2">Dhaka</option>
                                                            <option value="c-3">New York</option>
                                                            <option value="c-4">London</option>
                                                        </select>
                                                        <select class="custom-select">
                                                            <option value="defalt">Town/City</option>
                                                            <option value="c-1">Victoria</option>
                                                            <option value="c-2">Chittagong</option>
                                                            <option value="c-3">Boston</option>
                                                            <option value="c-4">Cambridge</option>
                                                        </select>
                                                        <textarea class="custom-textarea" placeholder="Your address here..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- our order -->
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">our order</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Dummy Product Name x 2</td>
                                                                <td class="td-title-2">$1855.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Dummy Product Name</td>
                                                                <td class="td-title-2">$555.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td class="td-title-2">$2410.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Shipping and Handing</td>
                                                                <td class="td-title-2">$15.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Vat</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price">$2425.00</td>
                                                            </tr>
                                                        </table>
                                                    </div> 
                                                    <!-- payment-method -->
                                                    <div class="payment-method">
                                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                                        <div id="accordion">
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                                                    direct bank transfer
                                                                    </a>
                                                                </h4>
                                                                <div id="bank-transfer" class="panel-collapse collapse in" >
                                                                    <div class="payment-content">
                                                                    <p>Lorem Ipsum is simply in dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    cheque payment
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                                    <div class="payment-content">
                                                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    paypal
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseThree" class="panel-collapse collapse" >
                                                                    <div class="payment-content">
                                                                        <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                                        <ul class="payent-type mt-10">
                                                                            <li><a href="#"><img src="img/payment/1.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="img/payment/2.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="img/payment/3.png" alt=""></a></li>
                                                                            <li><a href="#"><img src="img/payment/4.png" alt=""></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- payment-method end -->
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- checkout end -->
                                <!-- order-complete start -->
                                <div class="tab-pane" id="order-complete">
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                        </div>
                                        <div class="order-info p-30 mb-10">
                                            <ul class="order-info-list">
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                                <li>
                                                    <h6>order no</h6>
                                                    <p>m 2653257</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <!-- our order -->
                                            <div class="col-md-6">
                                                <div class="payment-details p-30">
                                                    <h6 class="widget-title border-left mb-20">our order</h6>
                                                    <table>
                                                        <tr>
                                                            <td class="td-title-1">Dummy Product Name x 2</td>
                                                            <td class="td-title-2">$1855.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Dummy Product Name</td>
                                                            <td class="td-title-2">$555.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Cart Subtotal</td>
                                                            <td class="td-title-2">$2410.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Shipping and Handing</td>
                                                            <td class="td-title-2">$15.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Vat</td>
                                                            <td class="td-title-2">$00.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="order-total">Order Total</td>
                                                            <td class="order-total-price">$2425.00</td>
                                                        </tr>
                                                    </table>
                                                </div>         
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bill-details p-30">
                                                    <h6 class="widget-title border-left mb-20">billing details</h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Address:</span>
                                                            28 Green Tower, Street Name, New York City, USA
                                                        </li>
                                                        <li>
                                                            <span>email:</span>
                                                            info@companyname.com
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                            (+880) 19453 821758
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="bill-details pl-30">
                                                    <h6 class="widget-title border-left mb-20">billing details</h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Address:</span>
                                                            28 Green Tower, Street Name, New York City, USA
                                                        </li>
                                                        <li>
                                                            <span>email:</span>
                                                            info@companyname.com
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                            (+880) 19453 821758
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner gray-bg">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="img/logo/logo.png" alt="">
                                        </div>
                                        <div class="footer-brief">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the subas industry's standard dummy text ever since the 1500s,</p>
                                            <p>When an unknown printer took a galley of type and If you are going to use a passage of Lorem Ipsum scrambled it to make.</p>
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Shipping</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Special Products</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">my account</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Account</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Check out</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Oder Complete</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Get in touch</h4>
                                        <div class="footer-message">
                                            <form action="#">
                                                <input type="text" name="name" placeholder="Your name here...">
                                                <input type="text" name="email" placeholder="Your email here...">
                                                <textarea class="height-80" name="message" placeholder="Your messege here..."></textarea>
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">submit message</button> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright-text">
                                        <p>&copy; <a href="https://freethemescloud.com/" target="_blank">Free themes Cloud</a> 2016. All Rights Reserved.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <ul class="footer-payment text-right">
                                        <li>
                                            <a href="#"><img src="img/payment/1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/4.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->  
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="lib/js/jquery.nivo.slider.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>