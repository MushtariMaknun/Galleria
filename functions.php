<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "galleria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}






function show()
{
   
    
    global $conn;
    if(isset($_GET['cat']))
    {
        if($_GET['cat']=="all")
        {
            
        
            $get_products = "select * from artwork where status='AVAILABLE' and category NOT IN ('multiframe')";
            $result = $conn->query($get_products);
        
           while($row = $result->fetch_assoc())
           {
                $art_id=$row['ARTWORK_ID'];
                $title=$row['TITLE'];
                $image=$row['IMAGE'];
                $price=$row['PRICE'];
            
            
               echo "
            
            <div class='col-md-4 col-sm-4 col-xs-12'>
                                                <div class='product-item'>
                                                    <div class='product-img'>
                                                        <a href='single-product.php?p_id= $art_id'>
                                                            <img src='$image' alt=''/>
                                                        </a>
                                                    </div>
                                                    <div class='product-info'>
                                                        <h6 class='$title'>
                                                            <a href='single-product.php?p_id= $art_id'>$title</a>
                                                        </h6>
                                                        
                                                        <h3 class='pro-price'>TK. $price</h3>
                                                        
                                                    </div>
                                                </div>
                                            </div>";
            
            
           }
        
        }
        
        
        else
        {
            $category= $_GET['cat'];
            
            $get_products = "select * from artwork where category='$category' and status='AVAILABLE'";
            $result = $conn->query($get_products);
            
            if($result->num_rows == 0)
            {
                echo "<div style='text-align: center;padding: 50px 50px 50px 50px;'><h2>No Product found in this category !</h2></div>";
            }
            else
            {    
                while($row = $result->fetch_assoc())
                {
                    $art_id=$row['ARTWORK_ID'];
                    $title=$row['TITLE'];
                    $image=$row['IMAGE'];
                    $price=$row['PRICE'];


                   echo "

                <div class='col-md-4 col-sm-4 col-xs-12'>
                                                    <div class='product-item'>
                                                        <div class='product-img'>
                                                            <a href='single-product.php?p_id= $art_id'>
                                                                <img src='$image' alt=''/>
                                                            </a>
                                                        </div>
                                                        <div class='product-info'>
                                                            <h6 class='$title'>
                                                                <a href='single-product.php?p_id= $art_id'>$title</a>
                                                            </h6>

                                                            <h3 class='pro-price'>TK. $price</h3>

                                                        </div>
                                                    </div>
                                                </div>";


               }
        }
            
          
        }   
        
        
    }
    
 
         
}


function filter()
{
    global $conn;
    
    if(isset($_POST["cat_side"]) && isset($_POST["optionType"]) && isset($_POST["optionOrientation"]))
    {
        $p_cat=$_POST["cat_side"];
        $p_type=$_POST["optionType"];
        $p_ori=$_POST["optionOrientation"];
        
        if($p_cat=="all")
        {
            $get_products = "select * from artwork where status='AVAILABLE' and type='$p_type' and orientation='$p_ori'";
            $result = $conn->query($get_products);
        }
        
        else
        {
            $get_products = "select * from artwork where status='AVAILABLE' and category='$p_cat' and type='$p_type' and orientation='$p_ori'";
            $result = $conn->query($get_products);
        }
        
        
        
        
        if($result->num_rows == 0)
            {
                echo "<div style='text-align: center;padding: 50px 50px 50px 50px;'><h2>No Product found in this category !</h2></div>";
            }
        
           while($row = $result->fetch_assoc())
           {
                $art_id=$row['ARTWORK_ID'];
                $title=$row['TITLE'];
                $image=$row['IMAGE'];
                $price=$row['PRICE'];
            
            
               echo "
            
            <div class='col-md-4 col-sm-4 col-xs-12'>
                                                <div class='product-item'>
                                                    <div class='product-img'>
                                                        <a href='single-product.php?p_id= $art_id'>
                                                            <img src='$image' alt=''/>
                                                        </a>
                                                    </div>
                                                    <div class='product-info'>
                                                        <h6 class='$title'>
                                                            <a href='single-product.php?p_id= $art_id'>$title</a>
                                                        </h6>
                                                        
                                                        <h3 class='pro-price'>TK. $price</h3>
                                                        
                                                    </div>
                                                </div>
                                            </div>";
            
            
           }
        
    }
    
}



////details of product


function details()
{
    global $conn;
    if(isset($_GET['p_id']))
    {
        $pro_id=$_GET['p_id'];
       
            $get_products = "select * from artwork where artwork_id='$pro_id'";
            $result = $conn->query($get_products);
            if($result->num_rows == 1)
            {
                while($row = $result->fetch_assoc())
                {
                    $art_id=$row['ARTWORK_ID'];
                    $artist_id=$row['ARTIST_ID'];
                    $size=$row['SIZE'];
                    $title=$row['TITLE'];
                    $image=$row['IMAGE'];
                    $price=$row['PRICE'];
                    $description=$row['DESCRIPTION'];
                    $type=$row['TYPE'];
                    
                    //echo $description;
                    
                }
                
                
                $artist_name = "select * from artist where artist_id='$artist_id'";
                $res_name=$conn->query($artist_name);
                
                if( $res_name->num_rows == 1)
                {
                    while($a_row = $res_name->fetch_assoc())
                    {
                        $first_name=$a_row['FIRST_NAME'];
                        $last_name=$a_row['LAST_NAME'];
                
                    }
                    
                }
                
                
                /////
                
                
                echo " <div class='shop-section mb-80'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-12 col-xs-15'>
                            <!-- single-product-area start -->
                            <div class='single-product-area mb-80'>
                                <div class='row'>
                                    <!-- imgs-zoom-area start -->
                                    
                                    <div class='col-md-6 col-sm-6 col-xs-10'>
                                        <div class='imgs-zoom-area'>
                                            <img id='zoom_03' src='$image' data-zoom-image='$image' alt=''>
                                            <div class='row'>
                                                <div class='col-xs-12'>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    
                               
                              
                                    <div class='col-md-5 col-sm-5 col-xs-12' >
                                        <div class='single-product-info'>
                                            <h3 class='text-black-1' style='font-weight: bold;font-size: 30px;'>$title</h3>
                                            <!--  <h6 class='brand-name-2'>brand name</h6>-->
                                            <li class='text-black-1' > By <a href='profile.php?profile_id=$artist_id' style='font-weight: bold;' >$first_name $last_name</a></li>
                                            <!--  hr -->
                                            <hr>
                                        <form method='POST' action='cart.php?action=add&id=$art_id'>
                                            <!-- plus-minus-pro-action -->
                                            <div class='plus-minus-pro-action clearfix'>
                                                <div class='sin-plus-minus f-left clearfix'>
                                                    <p class='color-title f-left'>Qty</p>
                                                    <div class='cart-plus-minus f-left'>
                                                        <input type='text' value='1' name='qtybutton' class='cart-plus-minus-box'>
                                                    </div>   
                                                </div>
                                               
                                            </div>
                                            <!-- plus-minus-pro-action end -->
                                            <!-- hr -->
                                            
                                            <hr>
                                            <h3 class='text-black-1'>Size: $size</h3>
                                            <hr>
                                            <!-- single-product-price -->
                                            <h3 class='text-black-1'>Price: TK. $price</h3>
                                            <!--  hr -->
                                            <hr>
                                            <div>
                                                <button class='submit-btn-1 btn-hover-1' name='add_to_cart' type='submit' >Add to Cart</button>
                                            
                                            </div>
                                            
                                            <input type='hidden' name='hidden_name' value= '$title' />
                                            <input type='hidden' name='hidden_image' value='$image' />
						                    <input type='hidden' name='hidden_price' value=$price />
                                            <input type='hidden' name='hidden_artist' value=$artist_id />
                                            <input type='hidden' name='hidden_type' value='$type' />
                                           
                                            
                                        </div>
                                    </div>
                                    
                                  </form> 
                                  
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <!-- hr -->
                                        <hr>
                                        <div class='single-product-tab'>
                                            <ul class='reviews-tab mb-20'>
                                                <li  class='active' style='font-weight: bold;font-size: 20px;'><a href='#description' >description</a></li>
                                                
                                            </ul>
                                            <div class='tab-content'>
                                                <div role='tabpanel' class='tab-pane active' id='description'>
                                                    <h3 class='text-black-1'>$description;</h3>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                            
                        </div>
                        
                    </div>
                </div>
            </div>";
                
                
          
            }
           
    }
    
}



function getProfile_img()
{
     global $conn;
    if(isset($_GET['profile_id']))
    {
        $pro_id=$_GET['profile_id'];
       
            $get_products = "select * from artwork where artist_id='$pro_id'";
            $result = $conn->query($get_products);
            if($result)
            {
                while($row = $result->fetch_assoc())
                {
                    $art_id=$row['ARTWORK_ID'];
                    
                    
                    $title=$row['TITLE'];
                    $image=$row['IMAGE'];
                    
                    
                    $status=$row['STATUS'];
                    
                    echo "<div class='col-md-3 col-sm-4 col-xs-12'>
                                            <div class='product-item'>
                                                <div class='product-img'>
                                                    <a href='single-product.php?p_id= $art_id'>
                                                        <img src='$image' alt=''/>
                                                    </a>
                                                </div>
                                                
                                                <div class='product-info'>
                                                        <h6 class='$title'>
                                                            <a href='single-product.php?p_id= $art_id'>$title</a>
                                                        </h6>
                                                        
                                                        <h6 class='product-title'>$status</h6>
                                                        
                                                    </div>
                                                
                                            </div>
                                        </div> ";
                    
                }
            }
        
    }
    
}

///search function

function search()
{
    global $conn;
    $tag="";
    if( isset($_POST['search']) )
    {
	   $tag=test_input($_POST['search']);
    }
    
    $get_products = "select * from artwork where status='AVAILABLE' and tags like '%$tag%'";
    $result = $conn->query($get_products);
        
           while($row = $result->fetch_assoc())
           {
                $art_id=$row['ARTWORK_ID'];
                $title=$row['TITLE'];
                $image=$row['IMAGE'];
                $price=$row['PRICE'];
            
            
               echo "
            
            <div class='col-md-4 col-sm-4 col-xs-12'>
                                                <div class='product-item'>
                                                    <div class='product-img'>
                                                        <a href='single-product.php?p_id= $art_id'>
                                                            <img src='$image' alt=''/>
                                                        </a>
                                                    </div>
                                                    <div class='product-info'>
                                                        <h6 class='$title'>
                                                            <a href='single-product.php?p_id= $art_id'>$title</a>
                                                        </h6>
                                                        
                                                        <h3 class='pro-price'>TK. $price</h3>
                                                        
                                                    </div>
                                                </div>
                                            </div>";
            
            
           }
   
    
    
    
}




function test_input($data) {
  $data = trim($data);
  
  return $data;
}








?>