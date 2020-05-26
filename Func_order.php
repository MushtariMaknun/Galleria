<?php

session_start();
include("core/database.php");

?>

<?php

$address = $_POST["address"];
$post_code = $_POST["postal_code"];
$district = $_POST["district"];


if(!empty($_SESSION["shopping_cart"]))
 {
    $total = 0;
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $total = $total + ($values["item_quantity"] * $values["item_price"]);
    }
    
    $order_total=$total+100;
 
 }
$id=$_SESSION['id'];


///insert into order table


$insert_order="INSERT INTO p_order(CUSTOMER_ID,ORDER_DATE,TOTAL_PRICE)
                    VALUES($id,CURDATE(),$order_total)";

$result = $conn->query($insert_order);

if($result)
 {
    
    ///insert into order details table
    
     $last_id = mysqli_insert_id($conn);
     foreach($_SESSION["shopping_cart"] as $keys => $values)
     {
         $art_id=$values["item_id"];
         $artist_id=$values["item_artist"];
         $quantity=$values["item_quantity"];
         $price=$values["item_price"];
         $a_type=$values["item_type"];
         
        $insert_odetails="INSERT INTO order_details(ORDER_ID,ARTWORK_ID,ARTIST_ID,QUANTITY,PRICE_EACH,TYPE)
                    VALUES($last_id,$art_id,$artist_id,$quantity,$price,'$a_type')";
         
         $Odetails = $conn->query($insert_odetails);
         
         
         ///update earnings of artist
         
             $get_earn="SELECT * FROM artist where ARTIST_ID='$artist_id'";
             $income=$conn->query($get_earn);
             if($income->num_rows == 1)
             {
                 while($a_row = $income->fetch_assoc())
                 {
                     $earnings=$a_row['EARNINGS'];
                     
                 }
                 
             }
         
        $total_qp= $quantity * $price;
        $earnings=$earnings+($total_qp * 0.65);
        
         $update_artist="UPDATE artist
                         SET EARNINGS=$earnings
                         WHERE ARTIST_ID='$artist_id'";
         
         $run_update=$conn->query($update_artist);
         
         
         
        ///update profit in admin table
         
         
         
         $get_profit="SELECT * FROM admin where ADMIN_ID=1";
             $ad_profit=$conn->query($get_profit);
             if($ad_profit->num_rows == 1)
             {
                 while($ad_row = $ad_profit->fetch_assoc())
                 {
                     $profit=$ad_row['PROFIT'];
                   
                 }
                 
             }
         
         $profit=$profit+($total_qp * 0.35);
         
        
         $update_admin="UPDATE admin
                         SET PROFIT=$profit
                         WHERE ADMIN_ID=1";
         
         $run_update=$conn->query($update_admin);
         
         
         ///notification
         
         $notification="INSERT INTO notification(ARTIST_ID,GENERATED_DATE,ORDER_ID,ARTWORK_ID)
                    VALUES($artist_id,CURDATE(),$last_id,$art_id)";
         
         $res_notify=$conn->query($notification);
         /*if($res_notify)
         {
             echo "notified";
         }*/
         
         
     ///type update
         
         if($a_type=="painting")
         {
             $update_type="UPDATE artwork
                          SET STATUS='SOLDOUT'
                         WHERE ARTWORK_ID=$art_id";
             
             $type_update=$conn->query($update_type);
             
         }
         
     } 
    
    
    ///add shipping cost
    
    $get_profit="SELECT * FROM admin where ADMIN_ID=1";
             $ad_profit=$conn->query($get_profit);
             if($ad_profit->num_rows == 1)
             {
                 while($ad_row = $ad_profit->fetch_assoc())
                 {
                     $profit=$ad_row['PROFIT'];
                   
                 }
                 
             }
         
         $profit=$profit+100.00;
         
        
         $update_admin="UPDATE admin
                         SET PROFIT=$profit
                         WHERE ADMIN_ID=1";
         
         $run_update=$conn->query($update_admin);
    
    
    ///shipment table update
    
     $shipment="INSERT INTO shipments(ORDER_ID,ADDRESS,POSTAL_CODE,DISTRICT,SHIPPING_COST)
                    VALUES($last_id,'$address','$post_code','$district',100.00)";
    
     $res_ship=$conn->query($shipment);
    
     
 }

unset($_SESSION["shopping_cart"]);

//header("Location: index.php");

  echo "<script>
window.location.href='index.php';
alert('Your Order Has Been Received !!');
</script>";


?>