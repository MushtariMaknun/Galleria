
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
$link="";

if( isset($_POST['af_name']) ){
	$f_name=test_input($_POST['af_name']);
}
if( isset($_POST['al_name']) ){
	$l_name=test_input($_POST['al_name']);
}
if( isset($_POST['aphone']) ){
	$phone=test_input($_POST['aphone']);
}

if( isset($_POST['aemail']) ){
	$email=test_input($_POST['aemail']);
}

if( isset($_POST['apass']) ){
	$password=test_input($_POST['apass']);
}
if( isset($_POST['alink']) ){
	$link='www.galleia.com/'.test_input($_POST['alink']);
}

$sql = "SELECT * FROM artist where email='" . $email . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows>0) {
       
            echo "<script>location.assign('signup_artist.php');</script>";
        
    }
        else{
                $insert_artist="insert into artist(first_name,last_name,email,password,phone_number,join_date,profile_link)
                values('$f_name','$l_name','$email','$password','$phone',curdate(),'$link')";

                $result = $conn->query($insert_artist);
                if($result)
                {
                    $start = "SELECT * FROM artist where email='" . $email . "' and password=" . $password; 
                    $result = $conn->query($start); 
    
                    if($result->num_rows == 1)
                    {
        
                        while($row = $result->fetch_assoc())
                        {
      
                            $_SESSION["id"] =$row["ARTIST_ID"];
                            $_SESSION["uname"] =$row["FIRST_NAME"];
                            $_SESSION["type"] = "artist";
                            $_SESSION["Active"] = "yes";
   
                        }  
                        $id=$_SESSION["id"];
                        echo "<script>location.assign('profile.php?profile_id=$id');</script>";
                   }
                    
                    
         
                }
        
        }

function test_input($data) {
  $data = trim($data);
  
  return $data;
}

?>

