<?php
include("../controler/db_conection.php");
session_start();

$email = $_SESSION['email'];

$view_users_query="select * from users WHERE user_email = '$email'";
$run=mysqli_query($dbcon,$view_users_query);
while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
{
    $user_id = $row[0];
    $user_name = $row[1];
    $user_email = $row[3];
    $user_ban = $row[5];
    $credits = $row[6];
    $euro = $credits / 10 ;
    $games = $credits / 5;

    if ($user_ban == 1) {
        $banned = "Banned";
    } else {
        $banned = "Active";

    }
}
?>