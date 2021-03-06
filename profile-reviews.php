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
                        <ul class="nav nav-tabs transactions" role="tablist" style="margin-bottom: 10px">
                            <li role="presentation" class="active"><a href="#reviw-about" aria-controls="reviw-about" role="tab" data-toggle="tab">Reviews About You</a></li>
                            <li role="presentation"><a href="#reviw-by" aria-controls="reviw-by" role="tab" data-toggle="tab">Reviews By You</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="reviw-about">
                                <div class="common_hold">
                                    <h4 class="grey_bac">Past Reviews</h4>
                                    <div class="common_hold-content-area">
                                        <p>Reviews are written at the end of a reservation through Estejmam. Reviews you've received will be visible both here and or your public profile.</p>
                                        <p>No one has reviewed you yet</p>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviw-by">
                                <div class="common_hold">
                                    <h4 class="grey_bac">Review by</h4>
                                    <div class="common_hold-content-area">
                                        <p>Content goes here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
