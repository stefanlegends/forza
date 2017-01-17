<?php
include("../model/nav3.php");
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <link href='../../assets/css/search.css' rel='stylesheet' type='text/css'>
    <title>View Users</title>
</head>

<body>
<div id="search">
    <form role="form" method="get" action="view_users.php"class="searchform cf">
        <input type="text" placeholder="find a user">
        <button type="submit value="zoeken" name="zoeken">Search</button>
    </form>
</div>
<div class="tablestyle">
<div class="table-scrol">
    <h1 align="center">All the Users</h1>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->


    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed padding-top:60 %;">
        <thead>

        <tr>

            <th>User Id</th>
            <th>User Name</th>
            <th>User E-mail</th>
            <th>Banned User</th>
            <th>User Options</th>
        </tr>
        </thead>

        <?php
        session_start();

        if(!$_SESSION['level']==100)
        {
            echo "<script>alert('log in met uw admin account!')</script>";
            echo "<script>window.open('welcome.php','_self')</script>";

            header("Location: welcome.php");
        }


        include("../controler/db_conection.php");
        $view_users_query="select * from users";//select query for viewing users.

        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $user_id = $row[0];
            $user_name = $row[1];
            $user_email = $row[3];
            $user_ban = $row[5];


        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $user_id;  ?></td>
            <td><?php echo $user_name;  ?></td>
            <td><?php echo $user_email;  ?></td>
            <td><?php echo $user_ban; ?></td>

            <td><a href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Ban user</button> <a href="unban.php?del=<?php echo $user_id ?>"><button class="btn btn-success">Unban user</button></a></td>

        </tr>


        <?php } ?>
    </table>
        </div>
</div>
</div>

</body>

</html>
