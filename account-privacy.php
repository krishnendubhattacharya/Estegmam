<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
?>

<?php
if (isset($_REQUEST['submit'])) {

   
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $social_connection = isset($_POST['social_connection']) ? $_POST['social_connection'] : '';
    



    $fields = array(
        'social_connection' => mysql_real_escape_string($social_connection),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

	

    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        $_SESSION['MSG']=1;
        header('Location:account-privacy.php');
        exit();
    }
  
}

if (isset($_REQUEST['submit_btn'])) {

   
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $search_engine = isset($_POST['search_engine']) ? $_POST['search_engine'] : '';
    



    $fields = array(
        'search_engine' => mysql_real_escape_string($search_engine),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

	

    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        $_SESSION['MSG']=2;
        header('Location:account-privacy.php');
        exit();
    }
  
}



$userprofile = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $_SESSION['userid'] . "'"));
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

    <body>



        <?php include 'includes/inner-header.php'; ?>


        <section class="my-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <ul class="account-menu">
                            <li <?php echo ($pagename=='account-notification.php') ? 'class="selected"' : ''; ?>><a href="account-notification.php">Notifications</a></li>
                            <li <?php echo ($pagename=='account-payment-methods.php') ? 'class="selected"' : ''; ?>><a href="account-payment-methods.php">Payment Methods</a></li>
                            <li <?php echo ($pagename=='account-payment-payout.php') ? 'class="selected"' : ''; ?>><a href="account-payment-payout.php">Payout Preferences</a></li>
                            <li <?php echo ($pagename=='account-transaction.php') ? 'class="selected"' : ''; ?>><a href="account-transaction.php">Transaction History</a></li>
                            <li <?php echo ($pagename=='account-privacy.php') ? 'class="selected"' : ''; ?>><a href="account-privacy.php">Privacy</a></li>
                            <li <?php echo ($pagename=='account-security.php') ? 'class="selected"' : ''; ?>><a href="account-security.php">Security</a></li>
                            <li><a href="#">Connected Apps</a></li>
                            <li <?php echo ($pagename=='account-settings.php') ? 'class="selected"' : ''; ?>><a href="account-settings.php">Settings</a></li>
                            <li><a href="#">Badges</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="" class="invite-friend btn-block">Invite Friends</a></p>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div class="common_hold">
						<form action="" method="POST">
						<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                            <h4 class="grey_bac">Social Connections
							<?php 
							if($_SESSION['MSG']=="1")
							{
							?>
							<span style="float:right;color:green;font-size:12px;">Information Seved...</span>
							<?php
							$_SESSION['MSG']='';
							}
							?>
							</h4>
                            <div class="common_hold-content-area">
                                <p>Curabitur ut posuere tellus, sit amet aliquet sem. Donec scelerisque velit metus, efficitur imperdiet dui ullamcorper iaculis. Nulla convallis bibendum lacus, in consectetur sapien cursus accumsan. Morbi iaculis viverra metus, ullamcorper sagittis nisl cursus sit amet. Quisque semper mollis maximus. Aenean consequat, sem vel sagittis tempus, leo libero vestibulum erat, in pulvinar lacus elit vitae augue.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...</p>

                                <p><input type="checkbox" name="social_connection" value="1" <?php if($userprofile['social_connection']=='1') { ?> checked <?php } ?>/> Share my activity with Facebook friends.</p>
                                <hr>
                                <p class="text-right">
								<!-- <a href="" class="btn btn-primary">Save Social Connections</a> -->
								<input type="submit" name="submit" value="Save Social Connections" class="btn btn-primary">
								</p>
                            </div>
                        </div>
						</form>
						<form action="" method="POST">
						<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                        <div class="common_hold">
                            <h4 class="grey_bac">Your listing and profile in Search Engines
							<?php 
							if($_SESSION['MSG']=="2")
							{
							?>
							<span style="float:right;color:green;font-size:12px;">Information Seved...</span>
							<?php
							$_SESSION['MSG']='';
							}
							?>
							</h4>
                            <div class="common_hold-content-area">
                                <p>Curabitur ut posuere tellus, sit amet aliquet sem. Donec scelerisque velit metus, efficitur imperdiet dui ullamcorper iaculis. Nulla convallis bibendum lacus, in consectetur sapien cursus accumsan. Morbi iaculis viverra metus, ullamcorper sagittis nisl cursus sit amet. Quisque semper mollis maximus. Aenean consequat, sem vel sagittis tempus, leo libero vestibulum erat, in pulvinar lacus elit vitae augue.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ...</p>

                                <p><input type="checkbox" name="search_engine" value="1" <?php if($userprofile['search_engine']=='1') { ?> checked <?php } ?>/> Include share my activity with Facebook friends.</p>
                                <hr>
                                <p class="text-right">
								<!-- <a href="" class="btn btn-primary">Save Findability</a> -->
								<input type="submit" name="submit_btn" value="Save Findability" class="btn btn-primary">
								</p>
                            </div>
                        </div>
						</form>
                    </div>
                </div>
            </div>

        </section>


        <?php include 'includes/footer.php'; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
