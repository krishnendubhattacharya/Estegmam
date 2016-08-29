<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
$id = $_REQUEST['id'];
$sdate = $_REQUEST['sdate'];
$edate = $_REQUEST['edate'];
$totalprice = $_REQUEST['price'];
$userid = $_SESSION['userid'];
$uploder_userid = $_REQUEST['uploder_userid'];
$currency = $_REQUEST['currency'];


$new_edate = end(explode('-',$edate));
$new_sdate = end(explode('-',$sdate));

$totaldays = $new_edate-$new_sdate;

$price = $totaldays*$totalprice;


$_SESSION['price'] = $price;
$_SESSION['S_DATE'] = $sdate;
$_SESSION['E_DATE'] = $edate;
$_SESSION['id'] = $id;
$_SESSION['user_id'] = $userid;
$_SESSION['uploder_user_id'] = $uploder_userid;
$_SESSION['total_days'] = $totaldays;


$row=mysql_fetch_array(mysql_query("SELECT * FROM `estejmam_tbladmin` WHERE `id`='1'"));
?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Estejmam</title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href='css/jquery.bxslider.css' rel='stylesheet' type='text/css'>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/style5.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
        <link rel="stylesheet" type="text/css" href="css/style8.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    </head>

    <body onLoad="javascript:document.fPaypal.submit();">
        
        
        <?php include 'includes/inner-header.php'; ?>

        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12">
                        

                        
                        <div class="common_hold">
                            <h4 class="grey_bac">Transfering you to paypal</h4>
                            <div class="common_hold-content-area">
                                <ul class="default-listing">
                                    <li>
                                        <p>Please Wait... It may take Few Seconds.....</p>
										
										<form id="fPaypal" name="fPaypal" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
		       <input type="hidden" name="cmd" value="_xclick">
		       <input type="hidden" name="rm" value="2">
		       <input type="hidden" name="quantity" value="1">
		       <input type="hidden" name="business" value="<?php echo $row['paypal_email'];?>">
		       <input type="hidden" name="currency_code" value="<?php echo $currency ?>">
		       <input type="hidden" name="notify_url" value="http://team3.nationalitsolution.co.in/estejmam/ipn.php">
		       <input type="hidden" name="return" value="http://team3.nationalitsolution.co.in/estejmam/success.php">
		       <input type="hidden" name="cancel_return" value="http://team3.nationalitsolution.co.in/estejmam/failure.php">
		       <input type="hidden" name="item_name" value="">
		       <input type="hidden" name="amount" value="<?php  echo $price;?>">
		       <input type="hidden" name="custom" value="<?php echo $id;?>">
		    </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>


        <?php include("includes/footer.php"); ?>
        
        

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
