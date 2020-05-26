
<?php

session_start();
include("core/database.php");

?>

<?php

$artist_id=$_GET["profile_id"];


$title="";
$description="";
$img_path="";
$type="";
$category="";
$orientation="";
$tags="";
$size="";
$price="";


if( isset($_POST['title']) ){
	$title=test_input($_POST['title']);
}
if( isset($_POST['description']) ){
	$description=test_input($_POST['description']);
}
if( isset($_POST['ipath']) ){
	$img_path=test_input($_POST['ipath']);
}

if( isset($_POST['type']) ){
	$type=test_input($_POST['type']);
}

if( isset($_POST['category']) ){
	$category=test_input($_POST['category']);
}
if( isset($_POST['orientation']) ){
	$orientation=test_input($_POST['orientation']);
}

if( isset($_POST['tags']) ){
	$tags=test_input($_POST['tags']);
}

if( isset($_POST['size']) ){
	$size=test_input($_POST['size']);
}
if( isset($_POST['price']) ){
	$price=test_input($_POST['price']);
}





///check if exists

$sql = "SELECT * FROM artwork where TITLE='$title'";
$result = $conn->query($sql);


if ($result->num_rows>0) 
{
       
   echo "<script>
        window.location.href='upload-work.php';
        alert('Use Different Title !!');
        </script>";
        
}
else
{
    
    
    $insert_art="insert into artwork (ARTIST_ID,TITLE,DESCRIPTION,IMAGE,UPLOAD_DATE,TAGS,ORIENTATION,CATEGORY,TYPE,SIZE,PRICE)
    values($artist_id,'$title','$description','$img_path',CURDATE(),'$tags','$orientation','$category','$type','$size',$price)";

    $result = $conn->query($insert_art);
    if($result)
    {
       echo "<script>
        window.location.href='profile.php?profile_id=$artist_id';
        alert('Uploaded Successfully !!');
        </script>";
    }
}






function test_input($data) 
{
  $data = trim($data);
  
  return $data;
}

?>