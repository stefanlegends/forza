<?php
include("../model/nav3.php");


session_start();

if(!$_SESSION['level'] == 100)
{
    echo "<script>alert('log in met uw admin account!')</script>";
    echo "<script>window.open('login.php','_self')</script>";

    header("Location: welcome.php");
}


?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <link href='../../assets/css/search.css' rel='stylesheet' type='text/css'>
    <title>wedstrijden</title>
</head>

<body>
<div id="search">
    <a href="wedstrijd_toevoegen.php"><button class="btn btn-info">wedstrijd aanmaken</button></a>
    <form class="searchform cf">
        <input type="text" placeholder="zoek een wedstrijd">
        <button type="submit">Search</button>
    </form>
</div>

<div class="table-scrol">
    <h1 align="center">Wedstrijden</h1>

    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
            <thead>

            <tr>

                <th>Wedstrijd ID</th>
                <th>Thuis team</th>
                <th>Uit team</th>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Goals Thuis team</th>
                <th>Goals Uit team</th>
                <th>Opties</th>
            </tr>
            </thead>

            <?php
            session_start();

            if(!$_SESSION['level']== 100)
            {
                echo "<script>alert('log in met uw admin account!')</script>";
                echo "<script>window.open('welcome.php','_self')</script>";

                header("Location: welcome.php");
            }


            include("../controler/db_conection.php");
            $view_wedstrijd_query="select * from wedstrijden";//select query for viewing games.
            $run=mysqli_query($dbcon,$view_wedstrijd_query);//here run the sql query.

            while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
            {
                $wedstrijd_id=$row[0];
                $thuis_team=$row[1];
                $uit_team=$row[2];
                $datum=$row[3];
                $tijd=$row[4];
                $doelpunten_thuis=$row[5];
                $doelpunten_uit=$row[6];


                ?>

                <tr>
                    <!--here showing results in the table -->
                    <td><?php echo $wedstrijd_id;  ?></td>
                    <td><?php echo $thuis_team;  ?></td>
                    <td><?php echo $uit_team;  ?></td>
                    <td><?php echo $datum; ?></td>
                    <td><?php echo $tijd; ?></td>
                    <td><?php echo $doelpunten_thuis; ?></td>
                    <td><?php echo $doelpunten_uit; ?></td>
                    <td><a href="doelpunten.php?id=<?php echo $wedstrijd_id ?>"><button class="btn btn-default">Goals toevoegen</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->

                </tr>

            <?php } ?>

        </table>
    </div>
</div>


</body>

</html>
