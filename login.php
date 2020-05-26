<?php
    session_start();
    if(isset($_SESSION["Active"])){
        echo"";
    }

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Galleria || Login</title>
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
    
    
    <style>
        
        .create-details--links {
           
            transition: 1s;
             margin: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: space-around;
            
}
   .circle-link.blue-circle-user {
      
       border-radius: 50%;
    border: 3px solid #1185ed;
       
      
}   
        
.heading-2, h2 {
    font-size: 24px;
    line-height: 32px;
    font-weight: bold;
    
}
        .radio{
          
            margin: -60px -210px 50px -210px;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: space-around;
        }     

</style>
    
    

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
                                    
                                    

                                    <?php if(isset($_SESSION["Active"]) && isset($_SESSION["type"]))
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
        <div class="breadcrumbs-section plr-200 mb-80">
            
                
                    
            <h2 class="heading-2" style="text-align: center">Choose your role</h2>
            <div class='create-details--links' style="text-align: center" >
                
                
                <div style="font-weight: bold" ><div class='circle-link blue-circle-user'><img src="../../img/login/register_user.png" alt=""></div ></div>
                
                
                
                <div style="font-weight: bold" ><div class='circle-link blue-circle-user'><img src="../../img/login/register_artist.png" alt=""></div ></div>
                
                
                
        
                <div style="font-weight: bold" ><div class='circle-link blue-circle-user'><img src="../../img/login/register_influencer.png" alt=""></div></div> 
            </div>
            
      
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="registered-customers" style="margin-left: 80px;margin-right:80px">
                                
                                <form action="checklogin.php" method="POST">
                                    
                                   
                                    
                                    <div class="radio" style="align-content: center">
                                    <label class="radio-inline" style="margin-left: -10px;margin-right:  10px">
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="customer" checked>Customer
                                    </label>
                                    <label class="radio-inline" style="margin-left: -10px;margin-right:  10px">
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="artist">Artist
                                    </label>
                                    <label class="radio-inline" >
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="admin">Admin
                                    </label>
                                        </div>                       
                                    
                                    
                                    <h6 class="widget-title border-left mb-50">login</h6>
                                    
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you have an account with us, Please log in.</p>
                                        <input type="text" id="uemail" name="email" placeholder="Email Address" required>
                                        <input type="password" id="upass" name="password" placeholder="Password" required>
                                        
                                        
                                        
                                        
                                        
                                        <div class="row">
                                                        <div class="col-sm-6">
                                                            <h6><a href="#">Forgot password?</a></h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                             <h6 style="margin-left: 98px"><a href="signup_cust.php">Don't have an account?</a></h6>
                                                        </div>
                                        </div>
                                        
                                        
                                        
                                 
                                        
                                        <button class="submit-btn-1 btn-hover-1" type="submit" style="margin-top: 20px">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->             

        </div>
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