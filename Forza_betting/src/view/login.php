<?php
session_start();//session starts here
?>



<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <link href='../../assets/css/css.css' rel='stylesheet' type='text/css'>
    <title>Login</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Inloggen</h3>
                </div>
                <div class="panel-body">
                    <img id="logo"src="../../assets/img/forza.png" alt="logo"/>
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Wachtwoord" name="pass" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Verstuur" name="Verstuur" >
                                    </form>
                                         <center><b>Heeft u nog geen account?</b> <br></b><a href="registration.php">Klik hier om een account te maken</a></center><!--for centered text-->
                                     </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<?php

include("../controler/db_conection.php");

if(isset($_POST['Verstuur'])) {
    $user_email = $_POST['email'];
    $user_pass = $_POST['pass'];

    $check_user = 'select * from users WHERE user_email="' . $user_email . '" AND user_pass="' . md5($user_pass) . '"';
    //$get_level = 'SELECT user_level FROM users WHERE user_email="' . $user_email . '"';
    //echo 'SELECT user_level FROM users WHERE user_email="'.$user_email.'"';
    $run = mysqli_query($dbcon, $check_user);
    //$level = mysqli_query($dbcon, $get_level);
        if (mysqli_num_rows($run)) {
            echo "<script>window.open('welcome.php','_self')</script>";

            $_SESSION['email'] = $user_email;//here session is used and value of $user_email store in $_SESSION.

        } else {
            echo "<script>alert('Email of Wachtwoord is incorrect!')</script>";


        }

    }
?>