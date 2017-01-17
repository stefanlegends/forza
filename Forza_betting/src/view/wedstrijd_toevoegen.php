<?php

session_start();

if(!$_SESSION['level'] == 100)
{
    echo "<script>alert('log in met uw admin account!')</script>";
    echo "<script>window.open('welcome.php','_self')</script>";

    header("Location: welcome.php");
}


?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Wedstrijd toevoegen</title>
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
                    <h3 class="panel-title">wedstrijd toevoegen</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="wedstrijd_toevoegen.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Thuis team" name="thuis_team" type="text" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Uit team" name="uit_team" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="datum" name="datum" type="text" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="tijd" name="tijd" type="time" autofocus>
                            </div>


                            <input class="btn btn-lg btn-success btn-block" type="submit" value="toevoegen" name="toevoegen" >

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

if(isset($_POST['toevoegen'])) {


    $thuis_team = $_POST['thuis_team'];
    $uit_team = $_POST['uit_team'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];

//insert the user into the database.
    $insert_user = 'insert into wedstrijden (thuis_team,uit_team,datum,tijd) VALUES ("' . $thuis_team . '","' . ($uit_team) . '","' . $datum . '","' . $tijd . '")';

    if (mysqli_query($dbcon, $insert_user)) {
        echo "<script>window.open('wedstijden_pannel.php','_self')</script>";
    }
} else {
}
?>