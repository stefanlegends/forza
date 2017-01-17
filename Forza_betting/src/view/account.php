<?php
include("../controler/db_conection.php");
include("info.php");
include("../model/nav2.php");
session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");
}$email = $_SESSION['email'];


?>
<link href='../../assets/css/nav.css' rel='stylesheet' type='text/css'>
<link href='../../assets/js/nav.js' rel='stylesheet' type='text/css'>
<link href='../../assets/css/account.css' rel='stylesheet' type='text/css'>
<link href='../../assets/js/account.js' rel='stylesheet' type='text/css'>

<body>
<div class="container">
    <div class="innerwrap">
        <section class="section1 clearfix">
            <div>
                <div class="row grid clearfix">
                    <div class="col2 first">
                        <img src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" alt="profile">
                        <h1><?php echo "welcome ";echo $user_name; ?></h1>
                        <p>Here you can check you're account overview</p>
                        <span><?php echo $banned; ?></span>
                    </div>
                    <div class="col2 last">
                        <div class="grid clearfix">
                            <div class="col3 first">
                                <h1><?php echo $credits;?></h1>
                                <span>Credits</span>
                            </div>
                            <div class="col3"><h1>452</h1>
                                <span>Games Played</span></div>
                            <div class="col3 last"><h1>242</h1>
                                <span>Wins</span></div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <ul class="row2tab clearfix">
                        <li><i class="fa fa-list-alt"><a href="credits.php"></i> Buy Credits</a></li>
                        <li><i class="fa fa-list-alt"></i> <a href="wedstrijden.php">Play a Game</a></li>
                        <li><i class="fa fa-check"></i> Settings <a href="settings.php"> </li>
                        <li><i class="fa fa-thumbs-o-up "></i><a href="logout.php"> Log out </a></li>
                    </ul>
                </div>
            </div>
			<span class="smalltri">

			<i class="fa fa-star"></i>
			</span>
        </section>

    </div>
</div>
</body>
</html>
