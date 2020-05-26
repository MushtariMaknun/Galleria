
<?php

if(isset($_POST["view"]) &&isset($_POST["id"]))
{
    $id=$_POST["id"];
 
    $connect = mysqli_connect("localhost", "root", "", "galleria");
    
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE notification SET is_read=1 WHERE is_read=0 and ARTIST_ID =$id";
  mysqli_query($connect, $update_query);
 }
    
 $query = "SELECT * FROM notification  where ARTIST_ID =$id ORDER BY notification_id DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
           $art_id=$row["ARTWORK_ID"];
          
           $title ="SELECT * FROM artwork  where ARTWORK_ID = $art_id";
           $art = mysqli_query($connect, $title);
           while($row_art = mysqli_fetch_array($art))
           {
               $a_title=$row_art["TITLE"];
           }
          
           $output .= '
           <li>
            <a href="#">
             <strong>'.$a_title.'</strong><br />
             <small><em>'. 'Has been sold.'.'</em></small><br />
             <small><em>'.$row["GENERATED_DATE"].'</em></small>
            </a>
           </li>
           <li class="divider"></li>
           ';
      }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM notification where ARTIST_ID =$id and is_read=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);

}


?>