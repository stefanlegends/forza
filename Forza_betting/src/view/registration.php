
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Registratie</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;

</style>
<body>

<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Registratie</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="registration.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Gebuikersnaam" name="name" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Wachtwoord" name="pass" type="password" value="">
                            </div>


                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >

                        </fieldset>
                    </form>
                    <center><b>Heeft u al een account?</b> <br></b><a href="login.php">Klik hier om in te loggen</a></center><!--for centered text-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<?php
include("../controler/db_conection.php");
if(isset($_POST['register'])) {


    $user_name = $_POST['name'];
    $user_pass = $_POST['pass'];
    $user_email = $_POST['email'];


    if ($user_name == '') {

        echo "<script>alert('Voer uw gebruikersnaam in')</script>";
        exit();//this use if first is not work then other will not show
    }

    if ($user_pass == '') {
        echo "<script>alert('Voer een wachtwoord in')</script>";
        exit();
    }

    if ($user_email == '') {
        echo "<script>alert('Voer uw email in ')</script>";
        exit();
    } else if (!FILTER_VAR($user_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Uw Email klopt niet ')</script>";
        exit();
    }

    $check_email_query = "select * from users WHERE user_email='$user_email'";
    $check_username_query = "select * from users WHERE user_name='$user_name'";

    $run_query = mysqli_query($dbcon, $check_email_query);
    $run_query2=mysqli_query($dbcon,$check_username_query);
    if (mysqli_num_rows($run_query) > 0) {
        echo "<script>alert('Email $user_email Bestaat al')</script>";
        exit();
    }  if (mysqli_num_rows($run_query2) > 0) {
        echo "<script>alert('gebruikersnaam $user_name Bestaat al')</script>";
        exit();
    }
//insert the user into the database.
        $insert_user = 'insert into users (user_name,user_pass,user_email) VALUES ("' . $user_name . '","' . md5($user_pass) . '","' . $user_email . '")';

        if (mysqli_query($dbcon, $insert_user)) {
            echo "<script>window.open('login.php','_self')</script>";
        }
}
?>