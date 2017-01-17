<?php

include("../controler/db_conection.php");
$delete_id=$_GET['del'];
$delete_query="UPDATE users SET ban = 'nee' WHERE id='$delete_id'";//delete query
$run=mysqli_query($dbcon,$delete_query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.open('view_users.php?deleted=gebruiker is geband','_self')</script>";
}

?>