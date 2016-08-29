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
    $push = isset($_POST['push']) ? $_POST['push'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $rupdate = isset($_POST['rupdate']) ? $_POST['rupdate'] : '';
    $account = isset($_POST['account']) ? $_POST['account'] : '';
    $others = isset($_POST['others']) ? $_POST['others'] : '';
    $gpromo = isset($_POST['gpromo']) ? $_POST['gpromo'] : '';
    $review = isset($_POST['review']) ? $_POST['review'] : '';





    $fields = array(
        'user_id' => mysql_real_escape_string($userid),
        'push' => mysql_real_escape_string($push),
        'phone' => mysql_real_escape_string($phone),
        'message' => mysql_real_escape_string($message),
        'rupdate' => mysql_real_escape_string($rupdate),
        'account' => mysql_real_escape_string($account),
        'others' => mysql_real_escape_string($others),
        'gpromo' => mysql_real_escape_string($gpromo),
        'review' => mysql_real_escape_string($review),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

	$userprofile_chk = mysql_num_rows(mysql_query("select * from `estejmam_notification` where `user_id`='" . $_REQUEST['userid'] . "'"));

	if($userprofile_chk==0)
	{
		$addQuery = "INSERT INTO `estejmam_notification` (`" . implode('`,`', array_keys($fields)) . "`)"
                . " VALUES ('" . implode("','", array_values($fields)) . "')";

        if (mysql_query($addQuery)) {

        header('Location:account-notification.php');
        exit();
    }
	}

	else
	{

    $editQuery = "UPDATE `estejmam_notification` SET " . implode(', ', $fieldsList)
            . " WHERE `user_id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        header('Location:account-notification.php');
        exit();
    }
  }
}



$userprofile = mysql_fetch_array(mysql_query("select * from `estejmam_notification` where `user_id`='" . $_SESSION['userid'] . "'"));
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
                       <form action="" method="POST"> 
					   <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
						<div class="common_hold">
                            <h4 class="grey_bac">Mobile Notifications</h4>
                            <div class="common_hold-content-area">
                                <ul class="noti-listing">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4>Push Notifications</h4>
                                                <p>Received push notifications to your iPhone, iPad or Android device.</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p><input type="checkbox" name="push" value="1" <?php if($userprofile['push']=='1') { ?> checked <?php } ?>/> Enable Push Notifications</p>
                                                <p>Download the <a href="">Estejmam App</a> to receive push notifications instead of plain text message.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4>Text Messages</h4>
                                                <p>Received mobile updates by regular SMS text Message.</p>
                                            </div>
                                            <div class="col-sm-8">
											<p><input type="checkbox" name="phone" value="1" <?php if($userprofile['phone']=='1') { ?> checked <?php } ?>/> Enable Text Message Notifications</p>
                                                <p>You can add and verify phone numbers on your account from the <a href="edit-profile.php">Change Phone Number</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4>Receive Notifications for:</h4>
                                                <p>Applies to both text messages & Push notifications.</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p class="margin-bot-0"><input type="checkbox" name="message" value="1" <?php if($userprofile['message']=='1') { ?> checked <?php } ?>/> Messages</p>
                                                <b>From Hosts and Gusets</b>
                                                <p class="margin-bot-0"><input type="checkbox" name="rupdate" value="1" <?php if($userprofile['rupdate']=='1') { ?> checked <?php } ?>/> Reservation Updates</p>
                                                <b>Confirmations, inquiries, changes and more</b>
                                                <p class="margin-bot-0"><input type="checkbox" name="account" value="1" <?php if($userprofile['account']=='1') { ?> checked <?php } ?>/> Account Activity</p>
                                                <b>Changes made to your account</b>
                                                <p class="margin-bot-0"><input type="checkbox" name="others" value="1" <?php if($userprofile['others']=='1') { ?> checked <?php } ?>/> Other</p>
                                                <b>Recommendations, tips, and more</b>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>

                        <div class="common_hold">
                            <h4 class="grey_bac">Email Settings</h4>
                            <div class="common_hold-content-area">
                                <ul class="noti-listing">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4>I want to receive:</h4>
                                                <p>Ypu can disable these at any time.</p>
                                            </div>
                                            <div class="col-sm-8">
                                                <p><input type="checkbox" name="gpromo" value="1" <?php if($userprofile['gpromo']=='1') { ?> checked <?php } ?>/> General promotions, updates, news, about Estejmam or general promotions for partner campaigns and services user survays.</p>
                                                <p><input type="checkbox" name="review" value="1" <?php if($userprofile['review']=='1') { ?> checked <?php } ?>/> Reservations and review reminders.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="text-right">
										<!-- <a href="" class="btn btn-primary">Save</a> -->
										<input type="submit" name="submit" value="Save" class="btn btn-primary">
										</p>
                                    </li>
                                </ul>
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
