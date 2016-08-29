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
   
	$password = isset($_POST['password']) ? $_POST['password'] : '';
    
	$oldpass = isset($_POST['oldpass']) ? $_POST['oldpass'] : '';
	$newpass = isset($_POST['newpass']) ? $_POST['newpass'] : '';

	$dbpass = md5($password);
    
$userprofile_chk = mysql_fetch_array(mysql_query("select * from `estejmam_user` where `id`='" . $userid . "'"));


    $fields = array(
        'password' => mysql_real_escape_string($dbpass),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

if($userprofile_chk['password']!=md5($oldpass))
	{
	    $_SESSION['MSG']=2;
        header('Location:account-security.php');
        exit();
	}
elseif($password!=$newpass)
	{
	    $_SESSION['MSG']=3;
        header('Location:account-security.php');
        exit();
	}
	else
	{
    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        $_SESSION['MSG']=1;
        header('Location:account-security.php');
        exit();
    }
	}
  
}

if (isset($_REQUEST['submit_btn'])) {

   
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $login_notification = isset($_POST['login_notification']) ? $_POST['login_notification'] : '';
    



    $fields = array(
        'login_notification' => mysql_real_escape_string($login_notification),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

	

    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        $_SESSION['MSG']=2;
        header('Location:account-security.php');
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
                            <h4 class="grey_bac">Change Your Password
							<?php 
							if($_SESSION['MSG']=="1")
							{
							?>
							<span style="float:right;color:green;font-size:12px;">Password Changed...</span>
							<?php
							$_SESSION['MSG']='';
							}
							?>
							<?php 
							if($_SESSION['MSG']=="2")
							{
							?>
							<span style="float:right;color:red;font-size:12px;">Old Password Is Incorrect...</span>
							<?php
							$_SESSION['MSG']='';
							}
							?>
							<?php 
							if($_SESSION['MSG']=="3")
							{
							?>
							<span style="float:right;color:red;font-size:12px;">New Password and Confirm Password Not Matched...</span>
							<?php
							$_SESSION['MSG']='';
							}
							?>
							</h4>
                            <div class="common_hold-content-area">
                                <form class="form-horizontal" action="" method="POST">
								<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Old Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="oldpass" class="form-control" id="inputEmail3" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control" id="inputEmail3" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="newpass" class="form-control" id="inputEmail3" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-right">
									<!-- <a href="" class="btn btn-primary">Update Password</a> -->
									<input type="submit" name="submit" value="Save" class="btn btn-primary">
									</p>
                                </form>
                            </div>
                        </div>
						<form class="form-horizontal" action="" method="POST">
						<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                        <div class="common_hold">
                            <h4 class="grey_bac">Login Notification</h4>
                            <div class="common_hold-content-area">
                                <p><input type="checkbox" name="login_notification" value="1" <?php if($userprofile['login_notification']=='1') { ?> checked <?php } ?>/> Turn on Login Notifications</p>
                                <p>Login notifications are an extra security feature. When you turn them on, we'll let you know when anyone logs into your Airbnb account from a new browser. This helps keep your account safe.</p>
                                <hr>
                                <p class="text-right">
								<!-- <a href="" class="btn btn-primary">Save</a> -->
								<input type="submit" name="submit_btn" value="Save" class="btn btn-primary">
								</p>
                            </div>
                        </div>
						</form>
                        <div class="common_hold">
                            <h4 class="grey_bac">Login History</h4>
                            <div class="common_hold-content-area">
                                <table class="table">
                                    <tr>
                                        <th>Browser</th>
                                        <th>Device/OS</th>
										<th>IP</th>
                                        <th colspan="2">Recent Activity</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $userprofile['which_browser'] ?></td>
                                        <td><?php echo $userprofile['which_os'] ?></td>
                                        <td><?php echo $userprofile['ip'] ?></td>
										<td><?php echo $userprofile['last_login'] ?></td>
                                        <td><a href="logout.php">Logout</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <?php include 'includes/inner-header.php'; ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/bootstrap.js"></script>


    </body>
</html>
