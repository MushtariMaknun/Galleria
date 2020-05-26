
<?php

session_start();
include("core/database.php");

?>

<?php

$f_name="";
$l_name="";
$phone="";
$email="";
$password="";

if( isset($_POST['cf_name']) ){
	$f_name=test_input($_POST['cf_name']);
}
if( isset($_POST['cl_name']) ){
	$l_name=test_input($_POST['cl_name']);
}
if( isset($_POST['cphone']) ){
	$phone=test_input($_POST['cphone']);
}

if( isset($_POST['cemail']) ){
	$email=test_input($_POST['cemail']);
}

if( isset($_POST['cpass']) ){
	$password=test_input($_POST['cpass']);
}


$sql = "SELECT * FROM customer where email='" . $email . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows>0) {
       
            echo "<script>location.assign('signup_cust.php');</script>";
        
    }
        else{
            
            $insert_cust="insert into customer(first_name,last_name,email,password,phone_number,join_date)
            values('$f_name','$l_name','$email','$password','$phone',curdate())";

            $result = $conn->query($insert_cust);
            
            if($result)
            {
               
                $start = "SELECT * FROM customer where email='" . $email . "' and password=" . $password; 
                $result = $conn->query($start); 
    
                if($result->num_rows == 1)
                {
        
                    while($row = $result->fetch_assoc())
                    {
      
                        $_SESSION["id"] =$row["CUSTOMER_ID"];
                        $_SESSION["uname"] =$row["FIRST_NAME"];
                        $_SESSION["type"] = "customer";
                        $_SESSION["Active"] = "yes";
   
                    }  
 
                    echo "<script>location.assign('index.php');</script>";
                }
        
            }
        }

function test_input($data) {
  $data = trim($data);
  
  return $data;
}


?>

