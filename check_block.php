<?php

session_start();
include("core/database.php");

?>


<?php

$status=$_POST["status"];

if(isset($_GET['artist_id'])) 
{
   $a_id=$_GET['artist_id']; 
}
        
if ($status=="block")
{
    $update_b = "update artist
                set is_blocked=1
                where artist_id='$a_id'";
    
    $result = $conn->query($update_b);

    $update_art="select * from artwork where artist_id='$a_id'";
    $run = $conn->query($update_art);
    if($run->num_rows>0)
    {
         while($row = $run->fetch_assoc())
         {
             $art_id=$row['ARTWORK_ID'];
             $art_status=$row['STATUS'];
             $art_type=$row['TYPE'];
             
             
             
             if($art_type=='painting' && $art_status=='AVAILABLE')
             {
                 
                 $update_work="update artwork
                                set status='UNAVAILABLE'
                                where artwork_id='$art_id'";
                 $run_update=$conn->query($update_work);
                 
                 
                 
                 
             }
             
             
             if($art_type!='painting' && $art_status=='AVAILABLE')
             {
                 
                 $update_work="update artwork
                                set status='UNAVAILABLE'
                                where artwork_id='$art_id'";
                 $run_update=$conn->query($update_work);
                 
             }
            
                 
             
             
         }
    }
    
    header("Location: admin.php");
    
}

else
{
    $update_b = "update artist
                set is_blocked=0
                where artist_id='$a_id'";
    
    $result = $conn->query($update_b);

    $update_art="select * from artwork where artist_id='$a_id'";
    $run = $conn->query($update_art);
    if($run->num_rows>0)
    {
         while($row = $run->fetch_assoc())
         {
             $art_id=$row['ARTWORK_ID'];
             $art_status=$row['STATUS'];
             $art_type=$row['TYPE'];
             
             
             
             if($art_type=='painting' && $art_status=='UNAVAILABLE')
             {
                 
                 $update_work="update artwork
                                set status='AVAILABLE'
                                where artwork_id='$art_id'";
                 $run_update=$conn->query($update_work);
                 
                 
                 
                 
             }
             
             
             if($art_type!='painting' && $art_status=='UNAVAILABLE')
             {
                 
                 $update_work="update artwork
                                set status='AVAILABLE'
                                where artwork_id='$art_id'";
                 $run_update=$conn->query($update_work);
                 
             }
            
                 
             
             
         }
    }
    
    header("Location: admin.php");
    
  
}



?>