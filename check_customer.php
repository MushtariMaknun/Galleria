<?php

session_start();
include("core/database.php");

?>

<?php
if(isset($_SESSION["Active"]) && isset($_SESSION["type"]))
{
    if($_SESSION["type"]=="customer")
    {
        header("Location: checkout.php");
    }
    else
    {
        echo "<script>
        window.location.href='login.php';
        alert('Please Login As A Customer');
        </script>";
        session_unset(); 
        session_destroy();
    }
    
}

else
{
     echo "<script>
window.location.href='login.php';
alert('Please Login First');
</script>";
}

?>