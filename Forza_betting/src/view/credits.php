<?php
include("../controler/db_conection.php");
include("info.php");
//include("../model/nav2.php");
session_start();

if(!$_SESSION['email'])
{

    header("Location: login.php");
}$email = $_SESSION['email'];

$edit_query="UPDATE users SET credtis = $newtotaal WHERE user_id='$user_id'";//update credits

$run=mysqli_query($dbcon,$edit_query);

if($run)
{
//javascript function to open in the same window
    if($_GET['toevoegen'] == 'toevoegen') {
        echo "<script>window.open('credits.php?edited=Credits zijn toegeveogd','_self')</script>";
    }
}

if(isset($_POST['koop'])) {
    $aankoop =($_POST['radio1']);
}
$newtotaal = $credits + $aankoop;
echo $newtotaal;
echo "</br>";
echo "dit is de aankoop"+$aankoop;
?>

<link href='../../assets/css/nav.css' rel='stylesheet' type='text/css'>
<link href='../../assets/js/nav.js' rel='stylesheet' type='text/css'>
<link href='../../assets/css/account.css' rel='stylesheet' type='text/css'>
<link href='../../assets/css/credits.css' rel='stylesheet' type='text/css'>

<body>
<div class="container">
    <div class="innerwrap">
        <section class="section1 clearfix">
            <div>
                <div class="row grid clearfix">
                    <div class="col2 first">

                        <h1>Credits kopen</h1>
                        <p>Forza betting gebruikt credtis als betalingsmiddel 10 credits is 1 euro. 1 spel is 5 credits.
                        kies hieronder het aantal credits dat u wilt aanschaffen.</p>
                    </div>
                    <div class="col2 last">
                        <div class="grid clearfix">
                            <div class="col3 first">
                                <h1><?php echo $credits;?></h1>
                                <span>Credits</span>
                            </div>
                            <div class="col3"><h1><? echo $euro; ?></h1>
                                <span>Euro</span></div>
                            <div class="col3 last"><h1><? echo $games; ?></h1>
                                <span>Games to play</span></div>
                        </div>
                    </div>
                </div>

            </div>
			<span class="smalltri">

			<i class="fa fa-star"></i>
			</span>
        </section>
    </div>
</div>
<div class="container">
    <form class="form cf">
        <section role="form" method="post" action="credits.php" class="plan cf">
            <h2>Kies het aantal credits:</h2>
            <input type="radio" name="radio1" id="free" value="50"><label class="free-label four col" for="free">50 Credits</label>
            <input type="radio" name="radio1" id="basic" value="100" checked><label class="basic-label four col" for="basic">100 Credits</label>
            <input type="radio" name="radio1" id="premium" value="250"><label class="premium-label four col" for="premium">250 Credits</label>
        </section>
        <section class="payment-type cf">
            <h2>Selecteer betaalmethode:</h2>
            <input type="radio" name="radio3" id="credit" value="credit"><label class="credit-label four col" for="credit">Credit Card</label>
            <input type="radio" name="radio3" id="debit" value="debit"><label class="debit-label four col" for="debit">IDeal</label>
            <input type="radio" name="radio3" id="paypal" value="paypal" checked><label class="paypal-label four col" for="paypal">Paypal</label>
        </section>
        <input class="submit" type="submit" value="Koop">
    </form>
</div>
</body>
</html>
