<?php

session_start();
include("core/database.php");

?>

<?php
$email = $_POST["email"];
$password = $_POST["password"];
$type = $_POST["optionsRadios"];

if($type=='customer')
{
   $sql = "SELECT * FROM customer where email='" . $email . "' and password=" . $password; 
   $result = $conn->query($sql); 
    
    if($result->num_rows == 1){
        
         while($row = $result->fetch_assoc()){
             
             
             
             $_SESSION["id"] =$row["CUSTOMER_ID"];
             $_SESSION["uname"] =$row["FIRST_NAME"];
             $_SESSION["type"] = "customer";
             $_SESSION["Active"] = "yes";
             
             
             
            header("Location: index.php");
             
         }
     
     
    }
    else{
     
      echo "<script>
window.location.href='login.php';
alert('Invalid User');
</script>";
    }
	
}
 
 
    

if($type=='artist')
{
   $sql = "SELECT * FROM artist where email='" . $email . "' and password=" . $password;  
   $result = $conn->query($sql); 
    
    if($result->num_rows == 1){
        
         while($row = $result->fetch_assoc()){
            
             $_SESSION["id"] =$row["ARTIST_ID"];
             $_SESSION["uname"] =$row["FIRST_NAME"];
             $_SESSION["type"] = "artist";
             $_SESSION["Active"] = "yes";
             
             $id=$row["ARTIST_ID"];
            header("Location: profile.php?profile_id=$id");
         }
     
     
    }
    else{
     
      echo "<script>
window.location.href='login.php';
alert('Invalid User');
</script>";
    }
	
}
else{
    $sql = "SELECT * FROM admin where email='" . $email . "' and password=" . $password;  
   $result = $conn->query($sql); 
    
    if($result->num_rows == 1){
        
         while($row = $result->fetch_assoc()){
            
             $_SESSION["id"] =$row["ADMIN_ID"];
             $_SESSION["uname"] =$row["FIRST_NAME"];
             $_SESSION["type"] = "admin";
             $_SESSION["Active"] = "yes";
            header("Location: admin.php");
         }
     
     
    }
    else
    {
     
      echo "<script>
            window.location.href='login.php';
            alert('Invalid User');
            </script>";
    }
}
?>