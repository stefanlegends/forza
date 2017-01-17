<?php
include("../controler/db_conection.php");
include("../model/nav2.php");

session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");
}

?>

<html>
<head>

    <title>
        Forza Betting
    </title>
</head>
<?php

$email = $_SESSION['email'];
$level="SELECT user_level FROM users WHERE user_email='$email'";
echo $_SESSION['email'];
$result =mysqli_query($dbcon,$level);
if (mysqli_num_rows($result) > 0) {
// output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["user_level" ] == 100) {
            $_SESSION['level'] = $level;
           echo '<script type="text/javascript">


var answer = confirm ("wilt u naar het admin panel?")
if (answer)
    window.location="view_users.php"
        </script>';
            //$_SESSION['level'] = $row["user_level"];
          //echo "<a href='view_users.php'>gebruikers beheren</a>";

        } else {
        }
    }
}
?>





</body>

</html>

