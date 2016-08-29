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
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    



    $fields = array(
        'country' => mysql_real_escape_string($country),
    );

    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

	

    $editQuery = "UPDATE `estejmam_user` SET " . implode(', ', $fieldsList)
            . " WHERE `id` = '" . mysql_real_escape_string($_REQUEST['userid']) . "'";

    if (mysql_query($editQuery)) {

        $_SESSION['MSG']=2;
        header('Location:account-settings.php');
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
                        <form class="form-horizontal" action="" method="POST">
						<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
                            <div class="common_hold">
                                <h4 class="grey_bac">Country of Residence</h4>
                                <div class="common_hold-content-area">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Country of residents <i class="fa fa-question-circle"></i></label>
                                        <div class="col-sm-4">
                                            <select name="country" class="form-control" required>
                                                <option value="" disabled selected>Select</option>
                                                <?php
                                                $coun = mysql_query("select * from `estejmam_countries`");
                                                while ($allcountry = mysql_fetch_array($coun)) {
                                                    ?>
                                                    <option value="<?php echo $allcountry['id'] ?>" <?php if ($userprofile['country'] == $allcountry['id']) { ?> selected <?php } ?>><?php echo $allcountry['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <h5 style="color:green;">Confirmed</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="text-right">
									<!-- <a href="" class="btn btn-primary">Save Country of Residence</a> -->
									<input type="submit" name="submit" value="Save Country of Residence" class="btn btn-primary">
									</p>
                                </div>
                            </div>
                            <div class="common_hold">
                                <h4 class="grey_bac">Cancel Account</h4>
                                <div class="common_hold-content-area">
                                   <input type="submit" name="submit1" value="Cancel my account" class="btn btn-primary">
									</p>
                                </div>
                            </div>
                        </form>
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
