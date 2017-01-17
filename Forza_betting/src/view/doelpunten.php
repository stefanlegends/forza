<?php

session_start();

if(!$_SESSION['level'] == 100)
{
    echo "<script>alert('log in met uw admin account!')</script>";
    echo "<script>window.open('welcome.php','_self')</script>";

    header("Location: welcome.php");
}


?>
<?php

include("../controler/db_conection.php");
$goals_thuis  = $_GET['thuis_team'];
$goals_uit = $_GET['uit_team'];
$edit_id=$_GET['id'];
$nieuw=$_GET['matchid'];

$edit_query="UPDATE wedstrijden SET thuis_doelpunten = '$goals_thuis',uit_doelpunten  = '$goals_uit' WHERE wedstrijd_id='$nieuw'";//delete query

$run=mysqli_query($dbcon,$edit_query);

if($run)
{
//javascript function to open in the same window
    if($_GET['toevoegen'] == 'toevoegen') {
        echo "<script>window.open('wedstijden_pannel.php?edited=goals zijn toegeveogd','_self')</script>";
    }
}

?>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
        <title>Goals</title>
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
                        <form role="form" method="get" action="doelpunten.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Goals thuis team" name="thuis_team" type="text" autofocus>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Goals uit team" name="uit_team" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="matchid" value="<?php echo $_GET['id']; ?>"
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


