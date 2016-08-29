<?php
ob_start();
session_start();
include("administrator/includes/config.php");
include("functions/functions.php");

if (!is_user_logged_in()) {
    header("location:index.php");
}
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
                            <li <?php echo ($pagename == 'profile-edit.php') ? 'class="selected"' : ''; ?>><a href="profile-edit.php">Edit Profile</a></li>
                            <li <?php echo ($pagename == 'profile-photo.php') ? 'class="selected"' : ''; ?>><a href="profile-photo.php">Photos, Symbol & Video</a></li>
                            <li <?php echo ($pagename == 'profile-verification.php') ? 'class="selected"' : ''; ?>><a href="profile-verification.php">Trust & Verification</a></li>
                            <li <?php echo ($pagename == 'profile-reviews.php') ? 'class="selected"' : ''; ?>><a href="profile-reviews.php">Reviews</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <p><a href="my_account.php" class="invite-friend btn-block">View Profile</a></p>
                    </div>
                    <div class="col-md-9 col-sm-8 profile-right-sec">
                        <form class="form-horizontal">
                            <div class="common_hold">
                                <div class="common_hold-content-area">
                                    <h4>Verify your ID</h4>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <p>Getting your Verified ID is the easiest way to help built trust in the Estejmam community. We'll verify you by matching information from an online account to an official ID. <a href="">Learn More</a></p>
                                            <p>Or you can choose to only add the verifications you want below</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <h2><a href="" class="btn btn-primary">Verify Me</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="common_hold">
                                <h4 class="grey_bac">Your Current Verification</h4>
                                <div class="common_hold-content-area">
                                    <h4>Google</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>Connect your Estejmam account to your Google account for simplicity and ease.</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><a href="" class="take-photo">Disconnect</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="common_hold">
                                <h4 class="grey_bac">Add More Verification</h4>
                                <div class="common_hold-content-area">
                                    <h4>Email Address</h4>
                                    <p>Please verify your Email address by clicking the link in the message we just sent to: companyname@gmail.com</p>
                                    <p>Can't find our message? Check your spam folder or <a href="">reset the confirmation mail.</a> </p>
                                    <h4>Phone Number</h4>
                                    <p>Make it easier to communicate with a verified phone no. We'll send you a code by SMS or read it to you over the phone. Enter the code below to confirm that you're the person on the other end.</p>
                                    <p>Rest assured, your number is only shared with another Estejmam member once you have a confirmed booking.</p>
                                    <p>No phone number entered.</p>
                                    <p><a href=""><i class="fa fa-plus"></i> Add a phone number</a></p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Facebook</h4>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>Sign in with Facebook and discover your trusted connections to hosts and guests all over the world. </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><a href="" class="take-photo btn-block">Connect</a></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>LinkedIn</h4>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>Create a link to your Professional life by connecting your Estejmam and LinkedIn Accounts.</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><a href="" class="take-photo btn-block">Connect</a></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>American Express &reg;</h4>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>Login with Amex to verify you're a Card Member on your Estejmam profile. Your card will also be added to your account.</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p><a href="" class="take-photo btn-block">Connect</a></p>
                                        </div>
                                    </div>
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
